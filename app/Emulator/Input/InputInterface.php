<?php

declare(strict_types=1);

namespace App\Emulator\Input;

interface InputInterface
{
    /**
     * Checks for input.
     */
    public function check(): void;
}
