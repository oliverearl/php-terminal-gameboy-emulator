<?php

declare(strict_types=1);

namespace App\Emulator\Debugger;

use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class Debugger
{
    /**
     * Prints out debug context to the canvas. If in debug mode, also to the logger.
     */
    public static function print(string $debug, mixed $context = []): void
    {
        info($debug);

        if (! app()->isProduction()) {
            Log::info($debug, is_array($context) ? $context : [$context]);
        }
    }

    /**
     * Prints out a warning to the canvas. If in debug mode, also to the logger.
     */
    public static function warning(string $message, mixed $content = []): void
    {
        warning($message);

        if (! app()->isProduction()) {
            Log::warning($message, is_array($content) ? $content : [$content]);
        }
    }
}
