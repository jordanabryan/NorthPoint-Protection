<?php

namespace App\Providers;


use App\Settings;
use App\Services;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('includes.header', function($view){

            $settings = Settings::first();

            return $view->with([
                'settings' => $settings,
            ]);

        });
        
        //
        view()->composer('includes.footer', function($view){

            $serviceLinks = Services::get();
            $settingsLinks = Settings::first();

            return $view->with([
                'serviceLinks' => $serviceLinks,
                'settings' => $settingsLinks,
            ]);

        });

        //
        view()->composer('includes.infobar', function($view){

            $settings = Settings::first();

            return $view->with([
                'settings' => $settings,
            ]);

        });

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
