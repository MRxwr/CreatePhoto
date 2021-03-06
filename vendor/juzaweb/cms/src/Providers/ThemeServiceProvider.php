<?php

namespace Juzaweb\Providers;

use Illuminate\Support\ServiceProvider;
use Juzaweb\Contracts\ThemeContract;
use Juzaweb\Contracts\ThemeInterface;
use Juzaweb\Support\Theme\Theme;
use Juzaweb\Support\ThemeFileRepository;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/theme.php', 'theme');

        $this->app->singleton(ThemeContract::class, function ($app) {
            $theme = new Theme($app, $this->app['view']->getFinder(), $this->app['config'], $this->app['translator']);

            return $theme;
        });

        $this->app->singleton(ThemeInterface::class, function ($app) {
            $path = config('juzaweb.theme.path');

            return new ThemeFileRepository($app, $path);
        });

        $this->app->alias(ThemeInterface::class, 'themes');
    }
}
