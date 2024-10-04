<?php

namespace Xchimx\GimmeProxy;

use Illuminate\Support\ServiceProvider;

class GimmeProxyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('gimmeproxy', function ($app) {
            return new GimmeProxy;
        });
    }

    public function boot() {}
}
