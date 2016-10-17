<?php

namespace Pixan\Api;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->publishes([
            __DIR__.'/config/pixanapi.php' => config_path('pixanapi.php'),
			__DIR__.'/migrations/2016_10_17_220629_create_pixan_api_logs_table.php' => 'database/migrations/2016_10_17_220629_create_pixan_api_logs_table.php'
        ]);

        $this->app->make('Pixan\Api\Controllers\ApiController');
		
		$this->app->make('Illuminate\Contracts\Http\Kernel')
		   ->pushMiddleware('Pixan\Api\Middleware\LogRequest');
		$this->app->make('Illuminate\Contracts\Http\Kernel')
   		   ->pushMiddleware('Pixan\Api\Middleware\AuthenticateOnceWithBasicAuth');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
		$this->mergeConfigFrom(
            __DIR__.'/config/pixanapi.php', 'pixanapi'
        );
    }
}
