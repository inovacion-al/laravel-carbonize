<?php

namespace InovacionAL\LaravelCarbonize;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use InovacionAL\LaravelCarbonize\Middleware\Carbonize;


class LaravelCarbonizeServiceProvider extends ServiceProvider {
    public function boot(Router $router)
    {
        $this->publishes([
            __DIR__.'/../config/carbonize.php' => config_path('carbonize.php')
        ]);

        $middlewareName = config('carbonize.middleware_name');
        $router->aliasMiddleware($middlewareName, Carbonize::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/carbonize.php', 'carbonize');
    }
}
