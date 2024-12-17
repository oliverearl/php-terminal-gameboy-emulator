<?php

declare(strict_types=1);

namespace App\Emulator\Debugger;

use function Laravel\Prompts\info as printInfo;

class Debugger
{
    /**
     * Prints out debug context to the canvas. If in debug mode, also to the logger.
     */
    public static function print(string $debug, mixed $context = []): void
    {
        printInfo($debug);

        if (! app()->isProduction()) {
            info($debug, is_array($context) ? $context : [$context]);
        }
    }
}
