<?php

declare(strict_types=1);

namespace App\Emulator;

use Illuminate\Support\Facades\Config;

use function Laravel\Prompts\warning;

class Keyboard
{
    /**
     * Default controls to fall back on in case there's a problem with the configuration.
     * The order is:
     *  - Right (d)
     *  - Left (a)
     *  - Up (w)
     *  - Down (s)
     *  - A (,)
     *  - B (.)
     *  - Select (n)
     *  - Start (m)
     *
     * @var array<string, int>
     */
    private const array DEFAULT_MAP = [
        'd' => 0,
        'a' => 1,
        'w' => 2,
        's' => 3,
        ',' => 4,
        '.' => 5,
        'n' => 6,
        'm' => 7,
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
     * The number of frames to wait before concluding a key has been released when no new input is received.
     */
    private int $holdTime = 5;

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
    private readonly array $keyMap;

    /**
     * Constructor.
     */
    public function __construct(private readonly Core $core)
    {
        $this->setControlMappings();
        $this->checkAndEnableInput();

        if ($this->usingDefaultControls) {
            warning('The controls have not been correctly configured. Using defaults.');
        }

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
        $key = fread($this->file, 1);

        // If no new character was read:
        if ($key === '' || $key === false) {
            if ($this->keyPressing !== null) {
                // Increment the hold counter and possibly release the key if enough time has passed.
                $this->holdCounter++;
                if ($this->holdCounter > $this->holdTime) {
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

    /**
     * Handles a key-down event by notifying the emulator core.
     *
     * @param string $key The key pressed.
     */
    private function keyDown(string $key): void
    {
        $keyCode = $this->matchKey($key);

        if ($keyCode > -1) {
            $this->core->joyPadEvent($keyCode, true);
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

        if ($keyCode > -1) {
            $this->core->joyPadEvent($keyCode, false);
        }
    }

    /**
     * Matches a pressed key character to its corresponding emulator button index.
     *
     * @param string $key The character read from the terminal.
     *
     * @return int The button index, or -1 if it does not match a known key.
     */
    private function matchKey(string $key): int
    {
        return $this->keyMap[$key] ?? -1;
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
            $this->keyMap = self::DEFAULT_MAP;

            return;
        }

        // The required order: Right, Left, Up, Down, A, B, Select, Start
        $this->keyMap = [
            $controls['right'] => 0,
            $controls['left'] => 1,
            $controls['up'] => 2,
            $controls['down'] => 3,
            $controls['a'] => 4,
            $controls['b'] => 5,
            $controls['select'] => 6,
            $controls['start'] => 7,
        ];
    }

    /**
     * Attempts to put the terminal into raw mode for enhanced input (no buffering, immediate char reads).
     * If `exec` is disabled or fails, falls back to a less optimal mode.
     */
    private function checkAndEnableInput(): void
    {
        $disabledFunctions = explode(',', (string) ini_get('disable_functions'));

        if (in_array('exec', $disabledFunctions, true)) {
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
