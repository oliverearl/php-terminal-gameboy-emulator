<?php

declare(strict_types=1);

use App\Emulator\Debugger\Debugger;
use Illuminate\Support\Facades\Log;

beforeEach(function (): void {
    Log::spy();
    $this->app->detectEnvironment(fn(): string => 'development');
});

describe('Debugger', function (): void {
    it('logs debug information in non-production mode', function (): void {
        $debugMessage = 'Debug message';
        $context = ['key' => 'value'];

        Debugger::print($debugMessage, $context);
        Log::shouldHaveReceived('info')->with($debugMessage, $context)->once();
    });

    it('logs debug information with non-array context', function (): void {
        $debugMessage = 'Debug message';
        $context = 'single value';

        Debugger::print($debugMessage, $context);
        Log::shouldHaveReceived('info')->with($debugMessage, [$context])->once();
    });

    it('does not log debug information in production mode', function (): void {
        $this->app->detectEnvironment(fn(): string => 'production');
        $debugMessage = 'Production debug message';
        $context = ['key' => 'value'];

        Debugger::print($debugMessage, $context);
        Log::shouldNotHaveReceived('info');
    });

    it('logs a warning in non-production mode', function (): void {
        $warningMessage = 'Warning message';
        $content = ['key' => 'value'];

        Debugger::warning($warningMessage, $content);
        Log::shouldHaveReceived('warning')->with($warningMessage, $content)->once();
    });

    it('logs a warning with non-array content', function (): void {
        $warningMessage = 'Warning message';
        $content = 'single value';

        Debugger::warning($warningMessage, $content);
        Log::shouldHaveReceived('warning')->with($warningMessage, [$content])->once();
    });

    it('does not log a warning in production mode', function (): void {
        $this->app->detectEnvironment(fn(): string => 'production');
        $warningMessage = 'Production warning message';
        $content = ['key' => 'value'];

        Debugger::warning($warningMessage, $content);
        Log::shouldNotHaveReceived('warning');
    });
});
