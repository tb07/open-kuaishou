<?php

namespace Tb07\OpenKuaiShou;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Lumen\Application as LumenApplication;


class LaravelServiceProvider extends BaseServiceProvider
{
    public function boot()
    {

    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = dirname(__DIR__) . '/config/kuaishou.php';
        if ($this->app->runningInConsole()) {
            $this->publishes([$source => base_path('config/kuaishou.php')], 'kuaishou');
        }

        if ($this->app instanceof LumenApplication) {
            $this->app->configure('kuaishou');
        }

        $this->mergeConfigFrom($source, 'kuaishou');
    }

    public function register()
    {
        $this->setupConfig();

        $this->app->singleton(OpenKuaiShou::class, function ($app) {
            return new OpenKuaiShou(config('kuaishou'));
        });

        $this->app->alias(OpenKuaiShou::class, 'open.kuaishou');
    }
}