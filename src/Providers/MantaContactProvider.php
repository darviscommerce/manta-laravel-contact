<?php

namespace Manta\LaravelContact\Providers;

use Manta\LaravelContact\Console\InstallMantaLaravelContact;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class MantaContactProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // * Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // * Artisan commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallMantaLaravelContact::class,
            ]);
        }
    }
}
