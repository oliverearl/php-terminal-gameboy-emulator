<?php

declare(strict_types=1);

namespace App\Emulator\Input;

use App\Emulator\Core;
use App\Emulator\Input\Devices\Keyboard;
use App\Emulator\Input\Devices\NullDevice;
use App\Emulator\Input\Enums\MagicKeypress;
use App\Emulator\Input\Interfaces\InputInterface;
use App\Exceptions\Input\InvalidInputDeviceException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class Input
{
    /**
     * Chosen input device.
     */
    private readonly InputInterface $input;

    /**
     * Keyboard to still listen for magic inputs if not primary input device.
     */
    private readonly ?Keyboard $eventListener;

    /**
     * The current input state. Two four-bit states.
     */
    private int $inputState = 0xFF;

    /**
     * Input constructor.
     */
    public function __construct(private readonly Core $core)
    {
        $inputDevice = Str::lower(Config::string('emulator.input_device'));

        $this->input = match ($inputDevice) {
            NullDevice::INPUT_DEVICE => resolve(NullDevice::class),
            Keyboard::INPUT_DEVICE => resolve(Keyboard::class, ['input' => $this, 'isPrimaryInput' => true]),
            default => new InvalidInputDeviceException($inputDevice),
        };

        if ($inputDevice === Keyboard::INPUT_DEVICE) {
            $this->eventListener = null;
        } else {
            $this->eventListener = resolve(Keyboard::class, ['input' => $this, 'isPrimaryInput' => false]);
        }
    }

    /**
     * Checks for new input.
     */
    public function check(): void
    {
        $this->input->check();

        if ($this->eventListener) {
            $this->eventListener->check();
        }
    }

    /**
     * Writes an input event to memory.
     */
    public function handleEvent(int $key, bool $down): void
    {
        if ($down) {
            // Clear the corresponding bit. (active low)
            $this->inputState &= ~(1 << $key);
        } else {
            // Set the corresponding bit.
            $this->inputState |= (1 << $key);
        }

        // Delegate the register update to memory
        $this->core->memory->updateJoypadRegister($this->inputState);
    }

    /**
     * Handles special input events.
     */
    public function handleSpecialEvent(MagicKeypress $event): void
    {
        match ($event) {
            MagicKeypress::TOGGLE_MENU => $this->core->toggleMenu(),
            MagicKeypress::DUMP_STATE => $this->core->dumpState(),
        };
    }

    /**
     * Returns the current input state.
     */
    public function getInputState(): int
    {
        return $this->inputState;
    }
}
