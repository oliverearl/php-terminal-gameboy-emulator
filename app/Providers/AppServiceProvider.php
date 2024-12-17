<?php

declare(strict_types=1);

namespace App\Providers;

use App\Emulator\Config\ConfigBladder;
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
            ConfigBladder::class,
            static fn($app): ConfigBladder => new ConfigBladder(),
        );
    }
}
