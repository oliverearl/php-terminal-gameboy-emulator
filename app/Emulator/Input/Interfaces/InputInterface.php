<?php

declare(strict_types=1);

namespace App\Emulator\Input\Interfaces;

interface InputInterface
{
    /**
     * Checks for input.
     */
    public function check(): void;
}
