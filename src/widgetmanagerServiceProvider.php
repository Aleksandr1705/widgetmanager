<?php

namespace almosoft\widgetmanager;

use Illuminate\Support\ServiceProvider;

class widgetmanagerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'almosoft');
       
        $this->loadViewsFrom(__DIR__.'/resources/views', 'almosoft');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');

        
        
        // Publishing is only necessary when using the CLI.
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
        $this->mergeConfigFrom(__DIR__.'/../config/almosoft/widgetmanager.php', 'widgetmanager');

        // Register the service the package provides.
        $this->app->singleton('widgetmanager', function ($app) {
            return new widgetmanager;
        });
        
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['widgetmanager'];
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
            __DIR__.'/../config/almosoft/widgetmanager.php' => config_path('almosoft/widgetmanager.php'),
        ], 'widgetmanager.config');
        $this->publishes([
            __DIR__.'/app/Http/Controllers/Admin/WidgetBodyController.php' => base_path('app/Http/Controllers/Admin/WidgetBodyController.php'),
        ], 'widgetmanager.widgetbodycontroller');
        
        // Publishing the views.
        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/almosoft'),
        ], 'widgetmanager.views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/public/vendor/almosoft' => public_path('vendor/almosoft'),
        ], 'widgetmanager.assets');
        
        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/almosoft'),
        ], 'widgetmanager.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/almosoft'),
        ], 'widgetmanager.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
