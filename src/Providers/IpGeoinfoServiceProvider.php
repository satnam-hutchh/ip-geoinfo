<?php

namespace Hutchh\IpGeoinfo\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Str;
use Hutchh\IpGeoinfo\Handler;
use Illuminate\Support\Facades\Log;
use Hutchh\IpGeoinfo\Managers;


class IpGeoinfoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/ipgeoinfo.php', 'ipgeoinfo');

        $this->app->singleton(
            abstract: Managers\IpGeoinfoManager::class,
            concrete: fn (Application $app) => new Managers\IpGeoinfoManager($app),
        );
    }

    /**
     * Bootstrap services. 
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/ipgeoinfo.php' => config_path('ipgeoinfo.php'),
            ],'config');
        }
    }
}
