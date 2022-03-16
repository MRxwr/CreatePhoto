<?php

namespace Sbhadra\Packagethemes\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Packagethemes\Models\Theme;
use Illuminate\Support\Facades\DB;
class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerPackage']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'getPackageThemes']);
        
    }

    public function registerPackage()
    {
       
        HookAction::registerPostType('package-themes', [
            'label' => trans('sbpa::app.themes'),
            'model' => Theme::class,
            'menu_position' => 34,
            'parent' => 'packages',
            'menu_icon' => 'fa fa-list',
        ]);
        HookAction::registerTaxonomy('categories', 'package-themes', [
            'label' => trans('sbpa::app.categories'),
            'menu_position' => 6, 
        ]); 
        
    }
    public function getPackageThemes()
    {
       

    }
    

}
