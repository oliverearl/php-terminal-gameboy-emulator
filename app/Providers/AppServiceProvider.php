<?php

namespace App\Providers;

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
        //
    }
}
