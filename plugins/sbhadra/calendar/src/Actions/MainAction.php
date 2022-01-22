<?php

namespace Sbhadra\Calendar\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Calendar\Models\Calendar;
use Sbhadra\Calendar\Models\CalendarSetting;
use Sbhadra\Photography\Models\Booking;
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
            $slots = count($post->slots);
            $bookings = DB::table('bookings')
                 ->select('booking_date', DB::raw('count(*) as total'))
                 ->where('status','Yes')
                 ->where('package_id',$package_id)
                 ->groupBy('booking_date')
                 ->get();  
                 $datesDisabled_array =array('13-01-2022');
                 foreach($bookings as $booking){
                    if($booking->total ==$slots ){
                        array_push($datesDisabled_array,$booking->booking_date);
                    }
                 }
               $datesDisabled = json_encode($datesDisabled_array);
            $setting = CalendarSetting::find(1);   
            return '<script>
            var startDate="'.$setting->start_date.'";
            var endDate="'.$setting->end_date.'";
            var datesDisabled = '.$datesDisabled.';
            var daysOfWeekDisabled = '.$setting->close_days.'
            </script>';
       }, 20, 1);
        
    }

}
