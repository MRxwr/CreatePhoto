<?php

namespace Sbhadra\Themeoptions\Providers;

use Juzaweb\Support\ServiceProvider;
use Sbhadra\Themeoptions\Actions\MainAction;
class ThemeoptionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
       
  $this->registerAction([
            MainAction::class
        ]);
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
