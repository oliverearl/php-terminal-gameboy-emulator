<?php

declare(strict_types=1);

namespace App\Exceptions\Memory;

use RuntimeException;

class InvalidMemoryAccessException extends RuntimeException
{
    /**
     * The memory address that caused the exception.
     */
    protected readonly int $address;

    /**
     * The type of operation being performed (e.g., 'read' or 'write').
     */
    protected readonly string $operation;

    /**
     * InvalidMemoryAccessException constructor.
     *
     * @param int|string $address The memory address, in decimal or hex format.
     * @param string $operation The operation type ('read' or 'write').
     */
    public function __construct(int|string $address, string $operation = 'write')
    {
        $this->address = is_string($address) ? hexdec($address) : $address;
        $this->operation = $operation;

        $message = sprintf(
            'Invalid memory %s operation at address 0x%04X.',
            $operation,
            $this->address,
        );

        parent::__construct($message);
    }

    /**
     * Get the memory address that caused the exception.
     */
    public function getAddress(): int
    {
        return $this->address;
    }

    /**
     * Get the operation type that caused the exception.
     */
    public function getOperation(): string
    {
        return $this->operation;
    }
}
