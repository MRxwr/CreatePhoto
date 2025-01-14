<?php
namespace Sbhadra\Regenerate\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Setting;

use Illuminate\Support\Facades\DB;
class MainAction extends Action
{
    public function handle()
    {
        
       // $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addDoKwtSMSAction']);
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerLinks']);

    }

   
 public function registerLinks()
    {
       
       HookAction::addAdminMenu(
            trans('List'),
            'media',
            [
                'icon' => 'fa fa-th',
                'position' => 5,
                'parent' => 'media',
            ]
        );
        HookAction::addAdminMenu(
            trans('Regenerate'),
            'media/list',
            [
                'icon' => 'fa fa-image',
                'position' => 10,
                'parent' => 'media',
            ]
        );
        
        // HookAction::addAdminMenu(
        //     trans('Package Image resize'),
        //     'media/package_resize',
        //     [
        //         'icon' => 'fa fa-image',
        //         'position' => 15,
        //         'parent' => 'media',
        //     ]
        // );
        
        // HookAction::addAdminMenu(
        //     trans('Theme Image resize'),
        //     'media/theme_resize',
        //     [
        //         'icon' => 'fa fa-image',
        //         'position' => 20,
        //         'parent' => 'media',
        //     ]
        // );
      
        
    }


}