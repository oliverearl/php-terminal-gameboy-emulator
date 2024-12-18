<?php

declare(strict_types=1);

namespace App\Emulator\Cpu;

/** @mixin \App\Emulator\Cpu\Cpu */
trait HandlesExecutionFlow
{
    /**
     * Execution state: emulator is running.
     */
    public const int STATE_RUNNING = 0x00;

    /**
     * Execution state: emulation is paused.
     */
    public const int STATE_PAUSED = 0x01;

    /**
     * Execution state: emulator is not ready.
     */
    public const int STATE_NOT_INITIALIZED = 0x02;

    /**
     * Execution state: emulator is in its initial state.
     */
    public const int STATE_INITIAL = 0x03;

    /**
     * Current execution state of the emulator.
     */
    private int $emulationState = self::STATE_INITIAL;

    /**
     * Returns the current emulation state.
     */
    public function getEmulationState(): int
    {
        return $this->emulationState;
    }

    /**
     * Sets the current emulation state.
     */
    public function setEmulationState(int $emulationState): void
    {
        $this->emulationState = $emulationState;
    }

    /**
     * Check whether the emulator is initialized.
     */
    public function isInitialized(): bool
    {
        return ($this->emulationState & self::STATE_NOT_INITIALIZED) === 0;
    }

    /**
     * Checks if the CPU is currently running.
     */
    public function isRunning(): bool
    {
        return ($this->emulationState & self::STATE_NOT_INITIALIZED) === 0;
    }

    /**
     * Checks if the CPU is paused.
     */
    public function isPaused(): bool
    {
        return ($this->emulationState & self::STATE_PAUSED) === self::STATE_PAUSED;
    }

    /**
     * Pauses the CPU execution.
     */
    public function pause(): void
    {
        $this->emulationState |= self::STATE_PAUSED;
    }

    /**
     * Resumes the CPU execution.
     */
    public function resume(): void
    {
        $this->emulationState &= ~self::STATE_PAUSED;
    }
}
