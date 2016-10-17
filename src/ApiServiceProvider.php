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
        //
        $this->app->make('Pixan\Api\Controllers\ApiController');
		$this->app->make('Illuminate\Contracts\Http\Kernel')
		   ->pushMiddleware('Pixan\Api\Middleware\LogRequest');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
