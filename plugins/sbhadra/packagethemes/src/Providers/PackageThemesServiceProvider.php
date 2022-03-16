<?php

namespace Sbhadra\Packagethemes\Providers;


use Sbhadra\Packagethemes\Actions\MainAction;
use Juzaweb\Support\ServiceProvider;

class PackageThemesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerAction([
            MainAction::class
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
