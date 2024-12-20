<?php

declare(strict_types=1);

namespace App\Emulator\Input;

use App\Emulator\Input\Enums\JoypadInput;
use App\Emulator\Input\Enums\MagicKeypress;
use Illuminate\Support\Facades\Config;
use function Laravel\Prompts\warning;

class Keyboard implements InputInterface
{
    /**
     * The input device type.
     */
    public const string INPUT_DEVICE = 'keyboard';

    /**
     * The number of frames to wait before concluding a key has been released when no new input is received.
     */
    private const int HOLD_TIME = 5;

    /**
     * Default controls to fall back on in case there's a problem with the configuration.
     *
     * @var array<string, \App\Emulator\Input\Enums\JoypadInput>
     */
    private const array DEFAULT_MAP = [
        'd' => JoypadInput::DPAD_RIGHT,
        'a' => JoypadInput::DPAD_LEFT,
        'w' => JoypadInput::DPAD_UP,
        's' => JoypadInput::DPAD_DOWN,
        ',' => JoypadInput::BTN_A,
        '.' => JoypadInput::BTN_B,
        'n' => JoypadInput::BTN_SELECT,
        'm' => JoypadInput::BTN_START,
    ];

    /**
     * The file handle from which we read keyboard input.
     *
     * @var resource
     */
    private $file;

    /**
     * The currently pressed key, or null if no key is currently pressed.
     */
    private ?string $keyPressing = null;

    /**
     * A counter tracking how many frames have passed since last input was read for the currently pressed key.
     */
    private int $holdCounter = 0;

    /**
     * Indicates whether we can use `exec()` to modify TTY behavior (for raw input).
     * If false, input may be laggier due to terminal buffering.
     */
    private bool $canUseEnhancedInput = true;

    /**
     * Indicates whether we had to fall back to default control mappings because of invalid configuration.
     */
    private bool $usingDefaultControls = false;

    /**
     * The current keyboard mapping of key characters to their corresponding emulator button indices.
     *
     * @var array<string, int>
     */
    private array $keyMap = self::DEFAULT_MAP;

    /**
     * Constructor.
     */
    public function __construct(private readonly Input $input, public readonly bool $isPrimaryInput)
    {
        if ($this->isPrimaryInput) {
            $this->setControlMappings();

            if ($this->usingDefaultControls) {
                warning('The controls have not been correctly configured. Using defaults.');
            }
        }

        $this->checkAndEnableInput();

        if (! $this->canUseEnhancedInput) {
            warning('PHP has been restricted and cannot modify the shell. Input might feel laggy.');
        }
    }

    /**
     * Destructor.
     * Restores the terminal to a sane state if enhanced input was used.
     */
    public function __destruct()
    {
        $this->restoreTerminal();
    }

    /**
     * Checks for keyboard input and updates the emulator state accordingly.
     * This should be called every frame in the main emulator loop.
     */
    public function check(): void
    {
        $key = fread($this->file, 5);
        $event = $this->checkForMagicInput($key);

        if ($event !== null) {
            $this->input->handleSpecialEvent($event);
        } elseif ($this->isPrimaryInput) {
            // If no new character was read:
            if ($key === '' || $key === false) {
                if ($this->keyPressing !== null) {
                    // Increment the hold counter and possibly release the key if enough time has passed.
                    $this->holdCounter++;
                    if ($this->holdCounter > self::HOLD_TIME) {
                        $this->keyUp($this->keyPressing);
                        $this->keyPressing = null;
                        $this->holdCounter = 0;
                    }
                }

                return;
            }

            // Reset hold counter since we got a character.
            $this->holdCounter = 0;

            // If a different key was previously pressed, release it first.
            if ($this->keyPressing !== null && $this->keyPressing !== $key) {
                $this->keyUp($this->keyPressing);
            }

            $this->keyDown($key);
            $this->keyPressing = $key;
        }
    }


    /**
     * Checks if the input is a special event. These are handled even if the primary
     * input is not the keyboard.
     */
    private function checkForMagicInput(string $key): ?MagicKeypress
    {
        return MagicKeypress::tryFrom($key) ?? null;
    }

    /**
     * Fires an input event to the emulator core.
     */
    public function fireInput(int|JoypadInput $keyCode, bool $down): void
    {
        $keyCode = $keyCode instanceof JoypadInput
            ? $keyCode->value
            : $keyCode;

        $this->input->handleEvent($keyCode, $down);
    }

    /**
     * Handles a key-down event by notifying the emulator core.
     *
     * @param string $key The key pressed.
     */
    private function keyDown(string $key): void
    {
        $keyCode = $this->matchKey($key);

        if ($keyCode !== JoypadInput::INVALID_INPUT) {
            $this->fireInput($keyCode, true);
        }
    }

    /**
     * Handles a key-up event by notifying the emulator core.
     *
         * @param string $key The key pressed.
     */
    private function keyUp(string $key): void
    {
        $keyCode = $this->matchKey($key);

        if ($keyCode !== JoypadInput::INVALID_INPUT) {
            $this->fireInput($keyCode, false);
        }
    }

    /**
     * Matches a pressed key character to its corresponding emulator button index.
     *
     * @param string $key The character read from the terminal.
     */
    private function matchKey(string $key): JoypadInput
    {
        return $this->keyMap[$key] ?? JoypadInput::INVALID_INPUT;
    }

    /**
     * Sets the control mappings either from configuration or falls back to defaults
     * if the configuration is invalid.
     */
    private function setControlMappings(): void
    {
        $controls = array_filter(Config::array('emulator.controls'));

        // There must be exactly as many controls as in DEFAULT_MAP
        if (count($controls) !== count(self::DEFAULT_MAP)) {
            $this->usingDefaultControls = true;

            return;
        }

        $this->keyMap = [
            $controls['right'] => JoypadInput::DPAD_RIGHT,
            $controls['left'] => JoypadInput::DPAD_LEFT,
            $controls['up'] => JoypadInput::DPAD_UP,
            $controls['down'] => JoypadInput::DPAD_DOWN,
            $controls['a'] => JoypadInput::BTN_A,
            $controls['b'] => JoypadInput::BTN_B,
            $controls['select'] => JoypadInput::BTN_SELECT,
            $controls['start'] => JoypadInput::BTN_START,
        ];
    }

    /**
     * Attempts to put the terminal into raw mode for enhanced input (no buffering, immediate char reads).
     * If `exec` is disabled or fails, falls back to a less optimal mode.
     */
    private function checkAndEnableInput(): void
    {
        $disabledFunctions = explode(',', (string) ini_get('disable_functions'));

        if (in_array('exec', $disabledFunctions, strict: true)) {
            $this->canUseEnhancedInput = false;
        }

        if ($this->canUseEnhancedInput) {
            $output = [];
            $resultCode = 0;

            exec('stty -icanon -echo', $output, $resultCode);

            if ($resultCode !== 0) {
                $this->canUseEnhancedInput = false;
            }
        }

        $this->file = fopen('php://stdin', 'r');
        stream_set_blocking($this->file, false);
    }

    /**
     * Restores the terminal state if enhanced input was used.
     */
    private function restoreTerminal(): void
    {
        if ($this->canUseEnhancedInput) {
            exec('stty sane');
        }
    }
}
