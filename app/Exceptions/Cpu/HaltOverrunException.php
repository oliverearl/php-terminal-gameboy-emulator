<?php

declare(strict_types=1);

namespace App\Exceptions\Cpu;

use RuntimeException;

/**
 * Class HaltOverrunException
 *
 * Represents the "halt overrun" scenario that occurs when the Game Boy CPU
 * executes the HALT opcode (0x76) while interrupts are disabled but a pending
 * interrupt exists. This hardware quirk causes the CPU to skip the next
 * instruction instead of halting properly.
 *
 * Purpose:
 * - This exception is intentionally thrown to signal a halt overrun situation.
 * - The exception handler can detect and ignore this exception to allow
 *   normal execution of the skipped opcode.
 *
 * Background:
 * - HALT normally pauses the CPU until an interrupt occurs.
 * - If interrupts are disabled (via DI) but an interrupt flag is set (pending),
 *   the CPU does not halt and skips the next opcode.
 *
 * Example Use:
 * - When handling the HALT opcode in your emulator, check for this scenario:
 *   If interrupts are disabled and pending interrupts exist, throw this exception
 *   so that the emulator can increment the program counter accordingly.
 */
class HaltOverrunException extends RuntimeException
{
    /**
     * The error message.
     *
     * @var string
     */
    public $message = 'HALT Overrun Exception: HALT skipped due to pending interrupt while interrupts are disabled.';
}
