<?php

namespace Juzaweb\Translation\Actions;

use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Session;

class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {
        $this->addAction(Action::BACKEND_CALL_ACTION, [$this, 'addBackendMenu']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'changeLanguageAction']);
    }

    public function addBackendMenu()
    {
        HookAction::addAdminMenu(
            trans('juzaweb::app.translations'),
            'translations',
            [
                'icon' => 'fa fa-language',
                'position' => 90,
            ]
        );
    }
    public function changeLanguageAction()
    {
        $this->addAction('theme.home.index', function () {
            $lang = '';
            if(isset($_REQUEST['lang'])){
                $lang = $_REQUEST['lang'];
            }else{
                $lang = 'ar';
            }
            
            if($lang=='' && Session::get('locale')==''){
                $lang = 'en';
            }else if($lang=='' && Session::get('locale')!=''){
                $lang = Session::get('locale'); 
            }
            Session::put('locale', $lang);
            app()->setLocale(Session::get('locale'));
        });
    }
}
