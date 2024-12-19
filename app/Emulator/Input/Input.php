<?php

declare(strict_types=1);

namespace App\Emulator\Input;

use App\Emulator\Core;
use App\Exceptions\Input\InvalidInputDeviceException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class Input
{
    /**
     * Chosen input device.
     *
     * @var \App\Emulator\Input\InputInterface
     */
    private readonly InputInterface $input;

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
            Keyboard::INPUT_DEVICE => resolve(Keyboard::class, ['input' => $this]),
            default => new InvalidInputDeviceException($inputDevice),
        };
    }

    /**
     * Checks for new input.
     */
    public function check(): void
    {
        $this->input->check();
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
     * Returns the current input state.
     */
    public function getInputState(): int
    {
        return $this->inputState;
    }
}
