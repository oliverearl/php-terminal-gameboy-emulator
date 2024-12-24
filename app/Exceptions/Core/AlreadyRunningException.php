<?php

declare(strict_types=1);

namespace App\Exceptions\Core;

use RuntimeException;

class AlreadyRunningException extends RuntimeException
{
    /**
     * The error message.
     *
     * @var string
     */
    public $message = 'The Game Boy emulator is already running.';
}
