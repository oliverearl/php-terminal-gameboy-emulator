<?php

declare(strict_types=1);

namespace App\Exceptions\Input;

use RuntimeException;

/**
 * Exception thrown when an invalid input device is specified.
 */
class InvalidInputDeviceException extends RuntimeException
{
    /**
     * Create a new exception instance.
     */
    public function __construct(string $device)
    {
        parent::__construct("Invalid input device specified: {$device}");
    }
}
