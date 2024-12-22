<?php

declare(strict_types=1);

namespace App\Providers;

use App\Emulator\Cartridge\Cartridge;
use App\Emulator\Config\ConfigBladder;
use App\Emulator\Core;
use App\Emulator\Input\Input;
use App\Emulator\LcdController;
use LaravelZero\Framework\Application;
use Override;
use Illuminate\Support\ServiceProvider;

use function Laravel\Prompts\confirm;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (
            extension_loaded('xdebug') &&
            (defined('ARTISAN_BINARY') && ARTISAN_BINARY !== 'pest') &&
            !confirm('Xdebug is enabled. This can seriously hurt performance. Are you sure you want to continue?')
        ) {
            exit;
        }
    }

    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        $this->app->singleton(
            Core::class,
            static fn(Application $app, array $params): Core => new Core(...$params),
        );

        $this->app->singleton(
            ConfigBladder::class,
            static fn(Application $app): ConfigBladder => new ConfigBladder(),
        );

        $this->app->singleton(
            Cartridge::class,
            static fn(Application $app, array $params): Cartridge => new Cartridge(...$params),
        );

        $this->app->singleton(
            Input::class,
            static fn(Application $app, array $params): Input => new Input(...$params),
        );

        $this->app->singleton(
            LcdController::class,
            static fn(Application $app, array $params): LcdController => new LcdController(...$params),
        );
    }
}
