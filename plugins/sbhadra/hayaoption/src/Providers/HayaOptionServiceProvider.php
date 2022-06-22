<?php

namespace Sbhadra\Hayaoption\Providers;

use Juzaweb\Support\ServiceProvider;
use Sbhadra\Hayaoption\Actions\MainAction;

class HayaOptionServiceProvider extends ServiceProvider
{
    public function boot()
    {
         //
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
