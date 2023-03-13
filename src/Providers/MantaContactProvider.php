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

        // * Routes
        $this->registerRoutes();

        // * Laravel components
        // Livewire::component('contact-create', ContactCreate::class);
        // Livewire::component('contact-update', ContactUpdate::class);
        // Livewire::component('contact-list', ContactList::class);

        // Livewire::component('widgets-contact', WidgetsContact::class);

        // * Language files
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'manta-laravel-contact');

        // * Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'manta-laravel-contact');

        // * Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewComponentsAs('manta-laravel-contact', [
            // MantaFooter::class,
        ]);

        // * Artisan commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallMantaLaravelContact::class,
            ]);
        }

        // * Publish options
        if ($this->app->runningInConsole()) {
            // Publish view components
            $this->publishes([
                __DIR__ . '/../Mail/' => app_path('Mail'),
                __DIR__ . '/../Http/' => app_path('Http'),
                __DIR__ . '/../resources/views/' => resource_path('views'),
                // __DIR__ . '/../View/Components/' => app_path('View/Components'),
                // __DIR__ . '/../public/' => public_path(''),
                // __DIR__ . '/../public/libs/' => public_path('libs'),
                // __DIR__ . '/../public/images/' => public_path('images'),
                // __DIR__ . '/../View/Components/' => app_path('View/Components'),
                // __DIR__ . '/../Traits/' => app_path('Traits'),
                // __DIR__ . '/../resources/' => resource_path(''),
                // __DIR__ . '/../resources/views/' => resource_path('views'),
                // __DIR__ . '/../resources/views/layouts/' => resource_path('views/layouts'),
                // __DIR__ . '/../resources/views/components/' => resource_path('views/components'),
                // __DIR__ . '/../database/seeders/' => resource_path('/../database/seeders'),
            ], 'manta-contact-components');


            $this->publishes([
              __DIR__.'/../config/config.php' => config_path('manta-contact.php'),
            ], 'config');

          }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'manta-contact');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        // dd(config('manta-contact.prefix'));
        return [
            'prefix' => config('manta-contact.prefix'),
            'middleware' => config('manta-contact.middleware'),
        ];
    }
}
