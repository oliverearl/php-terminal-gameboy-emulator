<?php

declare(strict_types=1);

namespace App\Exceptions\Core;

use RuntimeException;

class CoreNotInitializedException extends RuntimeException
{
    /**
     * The error message.
     *
     * @var string
     */
    public $message = 'The Game Boy emulator has not been initialized.';
}
