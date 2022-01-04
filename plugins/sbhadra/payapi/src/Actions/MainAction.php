<?php

namespace Sbhadra\Payapi\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Payapi\Http\Controllers\PayapiController;
// use Sbhadra\Payapi\Models\Movie\Movie;

class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {  
        //$this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'addSettingForm']);
         $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'doProcessPayApi']);
    }


    public function addSettingForm()
    {
        HookAction::addSettingForm('payapi', [
            'name' => trans('sbpa::app.payapi_setting'),
            'view' => view('sbpa::setting.tmdb'),
            'priority' => 20
        ]);
    }

    public function doProcessPayApi(){
        add_action('theme.payment.method', function($payment_data) {
            app('Sbhadra\Payapi\Http\Controllers\PayapiController')->doPayment($payment_data);
        }, 10, 1);   
    }
    
}