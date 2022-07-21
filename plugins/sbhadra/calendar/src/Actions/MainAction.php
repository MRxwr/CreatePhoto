<?php

namespace Sbhadra\Calendar\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Calendar\Models\Calendar;
use Sbhadra\Calendar\Models\CalendarSetting;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Timeslot;
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
          $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'getCalenderHooksAdmin']);
          
 
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
    public function getCalenderHooks($post){
        
        add_filters('theme.calendar.hooks', function($post){
            $datesDisabled_array =array();
            $package_id = $post->id; 
            $slots = count($post->slots);
            //var_dump($slots);
            
            //$calendar_dates = Calendar::where('package_id',$package_id)->where('slots','all')->get();
            $calendar_dates = Calendar::where('package_id',$package_id)->get();
            if(!empty( $calendar_dates)){
                foreach($calendar_dates as $cdate){
                    if($cdate->slots=='all'){
                        $dates = $this->getDatesFromRange($cdate->from_date, $cdate->to_date);
                        $datesDisabled_array = array_merge($datesDisabled_array,$dates);
                    }else{
                        $dates =  $this->getBookedDateWithdisableSlots( $format = 'd-m-Y',$cdate,$post);
                        $datesDisabled_array = array_merge($datesDisabled_array,$dates);
                        // $cslot = count(json_decode($cdate->slots));
                        // if($slots==$cslot){
                        //     $dates = $this->getDatesFromRange($cdate->from_date, $cdate->to_date);
                        //     $datesDisabled_array = array_merge($datesDisabled_array,$dates);
                        // }
                    }
                    
                }
            }

            $calendar_dates_all = Calendar::where('package_id',0)->get();
            if(!empty( $calendar_dates_all)){
                foreach($calendar_dates_all as $cdate){
                    if($cdate->slots=='all'){
                        $dates = $this->getDatesFromRange($cdate->from_date, $cdate->to_date);
                        $datesDisabled_array = array_merge($datesDisabled_array,$dates);
                    }else{
                        $dates =  $this->getBookedDateWithdisableSlots( $format = 'd-m-Y',$cdate,$post);
                        $datesDisabled_array = array_merge($datesDisabled_array,$dates);
                    }
                    
                }
            }
            //dd($calendar_dates);
            // $bookings = DB::table('bookings')
            //      ->select('booking_date', DB::raw('count(*) as total'))
            //      ->whereIn('status',['Yes','yes'])
            //      ->where('package_id',$package_id)
            //      ->groupBy('booking_date')
            //      ->get(); 

            $bookings = DB::table('bookings')
                 ->select('booking_date', DB::raw('count(*) as total'))
                 ->whereIn('status',['Yes','yes'])
                 ->groupBy('booking_date')
                 ->get();  
                 foreach($bookings as $booking){
                    if($booking->total >= $slots ){
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

    public function getCalenderHooksAdmin(){
        
        $this->addAction('admin.calendar.hooks', function(){
            if(isset($_REQUEST['id'])){
                $datesDisabled_array =array();
                $post = Package::find($_REQUEST['id']);
            $package_id = $_REQUEST['id']; 
            $slots = count($post->slots);
            $calendar_dates = Calendar::where('package_id',$package_id)->get();
            if(!empty( $calendar_dates)){
                foreach($calendar_dates as $cdate){
                    if($cdate->slots=='all'){
                        $dates = $this->getDatesFromRange($cdate->from_date, $cdate->to_date);
                        $datesDisabled_array = array_merge($datesDisabled_array,$dates);
                    }else{
                        $dates =  $this->getBookedDateWithdisableSlots( $format = 'd-m-Y',$cdate,$post);
                        $datesDisabled_array = array_merge($datesDisabled_array,$dates);
                        // $cslot = count(json_decode($cdate->slots));
                        // if($slots==$cslot){
                        //     $dates = $this->getDatesFromRange($cdate->from_date, $cdate->to_date);
                        //     $datesDisabled_array = array_merge($datesDisabled_array,$dates);
                        // }
                    }
                    
                }
            }
            // $bookings = DB::table('bookings')
            //      ->select('booking_date', DB::raw('count(*) as total'))
            //      ->whereIn('status',['Yes','yes'])
            //      ->where('package_id',$package_id)
            //      ->groupBy('booking_date')
            //      ->get(); 
            $bookings = DB::table('bookings')
                 ->select('booking_date', DB::raw('count(*) as total'))
                 ->whereIn('status',['Yes','yes'])
                 ->groupBy('booking_date')
                 ->get();  
                 $datesDisabled_array =array('13-01-2022');
                 foreach($bookings as $booking){
                    if($booking->total >=$slots ){
                        array_push($datesDisabled_array,$booking->booking_date);
                    }
                 }
               $datesDisabled = json_encode($datesDisabled_array);
            $setting = CalendarSetting::find(1);   
            echo '<script>
            var startDate="'.$setting->start_date.'";
            var endDate="'.$setting->end_date.'";
            var datesDisabled = '.$datesDisabled.';
            var daysOfWeekDisabled = '.$setting->close_days.'
            </script>';
                }
       }, 20, 1);
        
    }

    static function getBookedDateWithdisableSlots($format = 'd-m-Y',$cdate=array(),$post=array()){

        $package_id = $post->id; 
        $slots = count($post->slots); 
       // Declare an empty array 
        $cslot = count(json_decode($cdate->slots));
                       
       $array = array(); 
       $start= $cdate->from_date;
       $end= $cdate->to_date;
      // Variable that store the date interval 
      // of period 1 day 
      $interval = new \DateInterval('P1D'); 
    
      $realEnd = new \DateTime($end); 
      $realEnd->add($interval); 
    
      $period = new \DatePeriod(new \DateTime($start), $interval, $realEnd); 
    
      // Use loop to store date into array 
      foreach($period as $date) {   
         $booked_date = $date->format($format);  
         $bookings = DB::table('bookings')->where('package_id',$package_id)->whereIn('status',['Yes','yes'])->whereDate('booking_date','=',$booked_date)->count();  
        if($bookings>0){
           
            if($cslot==$slots || (($cslot + $bookings) >=$cslot) ){              
                $array[] = $date->format($format);
            }     
        }else if($cslot==$slots){              
            $array[] = $date->format($format);
        }     
      } 
    
      // Return the array elements 
      return $array; 

    }
    static function getDatesFromRange($start, $end, $format = 'd-m-Y') { 
          
      // Declare an empty array 
      $array = array(); 
        
      // Variable that store the date interval 
      // of period 1 day 
      $interval = new \DateInterval('P1D'); 
    
      $realEnd = new \DateTime($end); 
      $realEnd->add($interval); 
    
      $period = new \DatePeriod(new \DateTime($start), $interval, $realEnd); 
    
      // Use loop to store date into array 
      foreach($period as $date) {                  
          $array[] = $date->format($format);  
      } 
    
      // Return the array elements 
      return $array; 
    } 

    

}
