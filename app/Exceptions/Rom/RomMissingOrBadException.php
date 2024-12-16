<?php

declare(strict_types=1);

namespace App\Exceptions\Rom;

use RuntimeException;

class RomMissingOrBadException extends RuntimeException
{
    /**
     * The error message.
     *
     * @var string
     */
    public $message = 'The provided ROM file is either missing or corrupted.';
}
