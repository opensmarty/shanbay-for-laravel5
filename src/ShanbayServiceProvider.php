<?php

namespace Cong5\Shanbay;

use Cong5\Shanbay\Facades\ShanbayFacade;
use Illuminate\Support\ServiceProvider;

class ShanbayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/shanbay.php' => config_path('shanbay.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $config = $this->app['config'];

        $this->app->singleton('Shanbay', function () use ($config) {
            return new Shanbay(
                $config->get('shanbey.app_key'),
                $config->get('shanbey.app_secret'),
                $config->get('shanbey.redirect_uri'),
                $config->get('shanbey.access_token', null)
            );
        });

        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Shanbay', ShanbayFacade::class);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Shanbay::class];
    }
}
