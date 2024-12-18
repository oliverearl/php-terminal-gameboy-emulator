<?php

declare(strict_types=1);

namespace App\Emulator\Memory;

use App\Exceptions\Memory\InvalidMemoryAccessException;

/** @mixin \App\Emulator\Memory\Memory */
trait LowLevelAccess
{
    /**
     * Read a value from a specific memory address.
     *
     * @param int $address The memory address to read from.
     *
     * @throws \App\Exceptions\Memory\InvalidMemoryAccessException
     *
     * @return null|int The value stored at the memory address.
     */
    public function peekMemory(int $address): ?int
    {
        if (! array_key_exists($address, $this->memory)) {
            throw new InvalidMemoryAccessException($address, 'read');
        }

        return $this->memory[$address];
    }

    /**
     * Write a value to a specific memory address.
     *
     * @param int $address The memory address to write to.
     * @param null|int $data The value to write.
     *
     * @throws \App\Exceptions\Memory\InvalidMemoryAccessException
     */
    public function pokeMemory(int $address, ?int $data): void
    {
        if (! array_key_exists($address, $this->memory)) {
            throw new InvalidMemoryAccessException($address, 'write');
        }

        $this->memory[$address] = $data;
    }
}
