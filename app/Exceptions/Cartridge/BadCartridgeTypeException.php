<?php

declare(strict_types=1);

namespace App\Exceptions\Cartridge;

use RuntimeException;

class BadCartridgeTypeException extends RuntimeException
{
    /**
     * The error message.
     *
     * @var string
     */
    public $message = 'Cartridge type is unknown and/or incompatible!';
}
