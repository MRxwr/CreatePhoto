<?php

namespace Sbhadra\Calendar\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Calendar\Models\Calendar;
use Sbhadra\Calendar\Models\CalendarSetting;

class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {
          $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerCalender']);
          $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'getCalenderHooks']);
 
    }

    public function registerCalender()
    {
       
        HookAction::addAdminMenu(
            trans('sbca::app.calendar_setting'),
            'calendar-setting',
            [
                'icon' => 'fa fa-cogs',
                'position' => 3,
                'parent' => 'bookings',
            ]
        );
        HookAction::addAdminMenu(
            trans('sbca::app.booking_calendar'),
            'booking-calendar',
            [
                'icon' => 'fa fa-calendar',
                'position' => 4,
                'parent' => 'bookings',
            ]
        );
    }
    static function getCalenderHooks($post){
        
        add_filters('theme.calendar.hooks', function($post){
            $package_id = $post->id;
            $setting = CalendarSetting::find(1);   
            return '<script>
            var startDate="'.$setting->start_date.'";
            var endDate="'.$setting->end_date.'";
            var datesDisabled = [""];
            var daysOfWeekDisabled = '.$setting->close_days.'
            </script>';
       }, 20, 1);
        
    }

}
