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
     * Joypad constructor.
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
            $this->inputState &= 0xFF ^ (1 << $key);
        } else {
            $this->inputState |= (1 << $key);
        }

        $this->core->memory->memory[0xFF00] = ($this->core->memory->memory[0xFF00] & 0x30) + (((($this->core->memory->memory[0xFF00] & 0x20) === 0) ? ($this->inputState >> 4) : 0xF) & ((($this->core->memory->memory[0xFF00] & 0x10) === 0) ? ($this->inputState & 0xF) : 0xF));
    }

    /**
     * Returns the current input state.
     */
    public function getInputState(): int
    {
        return $this->inputState;
    }
}
