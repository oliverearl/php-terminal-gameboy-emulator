<?php

declare(strict_types=1);

namespace App\Providers;

use App\Emulator\Cartridge\CartridgeLoader;
use App\Emulator\Config\ConfigBladder;
use App\Emulator\Core;
use App\Emulator\LcdController;
use LaravelZero\Framework\Application;
use Override;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        $this->app->singleton(
            Core::class,
            static fn (Application $app, array $params): Core => new Core(...$params),
        );

        $this->app->singleton(
            ConfigBladder::class,
            static fn(Application $app): ConfigBladder => new ConfigBladder(),
        );

        $this->app->singleton(
            CartridgeLoader::class,
            static fn(Application $app, array $params): CartridgeLoader => new CartridgeLoader(...$params),
        );

        $this->app->singleton(
            LcdController::class,
            static fn(Application $app, array $params): LcdController => new LcdController(...$params),
        );
    }
}
