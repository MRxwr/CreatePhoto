<?php

namespace Sbhadra\Survey\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Survey\Models\Survey;
use Sbhadra\Survey\Models\Question;
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
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerSurvey']);
        // $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerBooking']);
        // $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerTaxonomies']);
        // $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'getBookingDetailsAjax']);
       $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'randerSurveyViews']);
       $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'sendSurveySms']);
    }

    public function registerSurvey()
    {
        
        HookAction::registerPostType('survey', [
            'label' => trans('sbsu::app.survey'),
            'model' => Survey::class,
            'menu_position' => 38,
            'menu_icon' => 'fa fa-list',
        ]);
        HookAction::registerPostType('question', [
            'label' => trans('sbsu::app.questions'),
            'model' => Question::class,
            'parent' => 'survey',
            'menu_position' => 39,
            'menu_icon' => 'fa fa-list',
        ]);
        
    }

    public function sendSurveySms(){
        $this->addAction('booking.complete.index', function($model) {
            
           }, 10, 1);
    }
    public function randerSurveyViews(){
        $this->addAction('booking.complete.index', function($model) {
            
        }, 10, 1);
    }
   

}
