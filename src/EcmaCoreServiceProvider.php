<?php

namespace EburonMedia\EcmaCore;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use EburonMedia\EcmaCore\Http\Middleware\Maintenance;
use EburonMedia\EcmaCore\Providers\SeedServiceProvider;
use EburonMedia\EcmaCore\Providers\EventServiceProvider;
use EburonMedia\EcmaCore\Http\Middleware\AuthenticateAsAdmin;

class EcmaCoreServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'eburonmedia');
        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'ecma-core');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'../../routes/web.php');

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('ecma.admin', AuthenticateAsAdmin::class);

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('ecma.maintenance', Maintenance::class);

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ecma-core.php', 'ecma-core');

        $this->app->register(EventServiceProvider::class);

        // Register the service the package provides.
        $this->app->singleton(
            'ecma-core',
            function ($app) {
                return new EcmaCore;
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ecma-core'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {

        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/ecma-core.php' => config_path('ecma-core.php'),
        ], 'ecma-core.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => public_path('resources/views/vendor/ecma-core'),
        ], 'ecma-core.views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('ecma'),
        ], 'ecma-core.assets');

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/eburonmedia'),
        ], 'ecmacore.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
