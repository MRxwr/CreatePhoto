<?php

namespace Sbhadra\Calendar\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Timeslot;
use Sbhadra\Photography\Models\Setting;
use Sbhadra\Calendar\Models\Calendar;
use Sbhadra\Calendar\Models\CalendarSetting;
use Sbhadra\Calendar\Models\DaySlots;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
    // public function getCalenderHooks($post){
        
    //     add_filters('theme.calendar.hooks', function($post){
    //         $slots = Timeslot::get();
    //         $days=array(0,1,2,3,4,5,6);
    //         $active_slots=[];
    //         foreach($days as $key){
    //             $active_slots[$key] = DB::table('day_slots')->where('day_key', $key)->where('status',1)->pluck('slot_id')->toArray();
    //         }
    //         $datesDisabled_array =array();
    //          $bookedDate_array =array();
    //         $package_id = $post->id; 
    //         $slots = count($post->slots);
    //         //var_dump($slots);
            
    //         //$calendar_dates = Calendar::where('package_id',$package_id)->where('slots','all')->get();
    //         $calendar_dates = Calendar::where('package_id',$package_id)->get();
    //         if(!empty( $calendar_dates)){
    //             foreach($calendar_dates as $cdate){
    //                 if($cdate->slots=='all'){
    //                     $dates = $this->getDatesFromRange($cdate->from_date, $cdate->to_date);
    //                     $datesDisabled_array = array_merge($datesDisabled_array,$dates);
    //                 }else{
    //                     $dates =  $this->getBookedDateWithdisableSlots( $format = 'd-m-Y',$cdate,$post);
    //                     $datesDisabled_array = array_merge($datesDisabled_array,$dates);
    //                     $bookedDate_array = array_merge($bookedDate_array,$dates);
    //                     $cslot = count(json_decode($cdate->slots));
    //                     if($slots==$cslot){
    //                         $dates = $this->getDatesFromRange($cdate->from_date, $cdate->to_date);
    //                         $datesDisabled_array = array_merge($datesDisabled_array,$dates);
    //                     }
    //                 }
                    
    //             }
    //         }

    //         $calendar_dates_all = Calendar::where('package_id',0)->get();
    //         if(!empty( $calendar_dates_all)){
    //             foreach($calendar_dates_all as $cdate){
    //                 if($cdate->slots=='all'){
    //                     $dates = $this->getDatesFromRange($cdate->from_date, $cdate->to_date);
    //                     $datesDisabled_array = array_merge($datesDisabled_array,$dates);
    //                 }else{
    //                     $dates =  $this->getBookedDateWithdisableSlots( $format = 'd-m-Y',$cdate,$post);
    //                     $datesDisabled_array = array_merge($datesDisabled_array,$dates);
    //                     $bookedDate_array = array_merge($bookedDate_array,$dates);
    //                 }
                    
    //             }
    //         }
    //         //dd($calendar_dates);
    //         // $bookings = DB::table('bookings')
    //         //      ->select('booking_date', DB::raw('count(*) as total'))
    //         //      ->whereIn('status',['Yes','yes'])
    //         //      ->where('package_id',$package_id)
    //         //      ->groupBy('booking_date')
    //         //      ->get(); 

    //          $bookings = DB::table('bookings')
    //              ->select('booking_date', DB::raw('count(*) as total'))
    //              ->where('package_id',$package_id)
    //              ->whereIn('status',['Yes','yes'])
    //              ->groupBy('booking_date')
    //              ->get();  
    //              foreach($bookings as $booking){
    //                 if($booking->total >= $slots ){
    //                     array_push($datesDisabled_array,$booking->booking_date);
    //                     array_push($bookedDate_array,$booking->booking_date);
    //                 }
    //              }
    //         $datesDisabled = json_encode($datesDisabled_array);
    //          $bookedDate= json_encode($bookedDate_array);
    //         $setting = CalendarSetting::find(1); 
    //         $close_days = '[9]';
    //         if($setting->close_days!=null){
    //             $close_days = $setting->close_days;
    //         }
    //         return '<script>
    //         var startDate="'.$setting->start_date.'";
    //         var endDate="'.$setting->end_date.'";
    //         var datesDisabled = '.$datesDisabled.';
    //         var daysOfWeekDisabled = '.$close_days.';
    //         var bookedDates = '.$bookedDate.';
    //         </script>';
    //   }, 20, 1);
        
    // }
    
    public function getCalenderHooks($post) {
    add_filters('theme.calendar.hooks', function($post) {
       // $slots = Timeslot::get(); // Fetch all timeslots
        $setting = CalendarSetting::find(1); 
        $days = range(0, 6); // Days of the week (0-6)
        $active_slots = [];

        // Retrieve active slots for each day of the week
        foreach($days as $key) {
            $active_slots[$key] = DB::table('day_slots')->where('day_key', $key) ->where('status', 1)->pluck('slot_id')->toArray();
        }

        $datesDisabled_array = [];
        $bookedDate_array = [];
        $package_id = $post->id; 
        $slotsCount = count($post->slots);
        $cslotCount =0;

        // Fetch calendar dates for the package
        //$calendar_dates = Calendar::where('package_id', $package_id)->get();
        $calendar_dates = Calendar::whereIn('package_id', [0, $package_id])->where(function ($query) use ($setting) {
            $query->where(function ($query) use ($setting) {
                // Case where the from_date and to_date are fully within the start_date and end_date range
                $query->where('from_date', '<=', $setting->end_date)
                      ->where('to_date', '>=', $setting->start_date);
            });
        })->get();
        foreach($calendar_dates as $cdate) {
            if($cdate->package_id==0){
                if ($cdate->slots == 'all'){
                    $dates = $this->getDatesFromRange($cdate->from_date, $cdate->to_date);
                    $datesDisabled_array = array_merge($datesDisabled_array, $dates);
                } else {
                    $dates = $this->getBookedDateWithdisableSlots('d-m-Y', $cdate, $post);
                    $datesDisabled_array = array_merge($datesDisabled_array, $dates);
                    $bookedDate_array = array_merge($bookedDate_array, $dates);
                }
            }else{
                if ($cdate->slots == 'all') {
                    $dates = $this->getDatesFromRange($cdate->from_date, $cdate->to_date);
                    $datesDisabled_array = array_merge($datesDisabled_array, $dates);
                } else{
                    $dates = $this->getBookedDateWithdisableSlots('d-m-Y', $cdate, $post);
                    $datesDisabled_array = array_merge($datesDisabled_array, $dates);
                    $bookedDate_array = array_merge($bookedDate_array, $dates);
                    $cslotCount = count(json_decode($cdate->slots));
                    
                }
            }
            
        }
         if($setting->cwith_days>0){
              $today = date('d-m-Y');
              if($setting->cwith_days==1){
                 //$NewDate=Date('d-m-Y', strtotime('+'.$sys_dates->cwith_days.' days')); 
                 $NewDate= date('d-m-Y');
              }else{
                 $incd=$setting->cwith_days-1;
                 $NewDate=Date('d-m-Y', strtotime('+'.$incd.' days')); 
              }
              
              $currnt_close_date = $this->getDatesFromRange($today, $NewDate);
              $datesDisabled_array = array_merge($datesDisabled_array,$currnt_close_date);
          }
       
       $dates =  $this->getBookedDatewithSlots($format = 'd-m-Y', $setting->start_date, $setting->end_date,$post);
       
       $datesDisabled_array = array_merge($datesDisabled_array, $dates);
       $datesDisabled_array=array_unique($datesDisabled_array);
       $datesDisabled_array = array_values($datesDisabled_array);
       
       $bookedDate_array = array_merge($bookedDate_array, $dates);
       $bookedDate_array =  array_unique($bookedDate_array);
       $bookedDate_array = array_values($bookedDate_array);
       
       $datesDisabled = json_encode($datesDisabled_array);
       $bookedDate = json_encode($bookedDate_array);
        
        $close_days = $setting->close_days ?? '[9]';

        return '<script>
            var startDate = "'.$setting->start_date.'";
            var endDate = "'.$setting->end_date.'";
            var datesDisabled = '.$datesDisabled.';
            var daysOfWeekDisabled = '.$close_days.';
            var bookedDates = '.$bookedDate.';
        </script>';
    }, 20, 1);
}


    public function getCalenderHooksAdmin(){
        
        $this->addAction('admin.calendar.hooks', function(){
            if(isset($_REQUEST['id'])){
                $setting = CalendarSetting::find(1);  
                $datesDisabled_array =array();
                 $bookedDate_array =array();
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
                        $bookedDate_array = array_merge($bookedDate_array,$dates);
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
            
        if($setting->cwith_days>0){
              $today = date('d-m-Y');
              if($setting->cwith_days==1){
                 //$NewDate=Date('d-m-Y', strtotime('+'.$sys_dates->cwith_days.' days')); 
                 $NewDate= date('d-m-Y');
              }else{
                  $incd=$setting->cwith_days-1;
                  $NewDate=Date('d-m-Y', strtotime('+'.$incd.' days')); 
              }
              
              $currnt_close_date = $this->getDatesFromRange($today, $NewDate);
              $datesDisabled_array = array_merge($datesDisabled_array,$currnt_close_date);
          }
            
            $bookings = DB::table('bookings')
                 ->select('booking_date', DB::raw('count(*) as total'))
                 ->whereIn('status', ['Yes', 'yes'])
                 ->groupBy('booking_date')
                 ->get();  
                // $datesDisabled_array =array('13-01-2022');
                 foreach($bookings as $booking){
                    if($booking->total >=$slots ){
                        array_push($datesDisabled_array,$booking->booking_date);
                        array_push($bookedDate_array,$booking->booking_date);
                    }
                 }
               $datesDisabled = json_encode($datesDisabled_array);
              $bookedDate= json_encode($bookedDate_array);
            
            $close_days = '[9]';
            if($setting->close_days!=null){
                $close_days = $setting->close_days;
            }
            
       
            echo '<script>
            var startDate="'.$setting->start_date.'";
            var endDate="'.$setting->end_date.'";
            var datesDisabled = '.$datesDisabled.';
            var daysOfWeekDisabled = '.$close_days.'
            var bookedDates = '.$bookedDate.';
            </script>';
                }
       }, 20, 1);
        
    }

    static function getBookedDateWithdisableSlots($format = 'd-m-Y',$cdate=array(),$post=array()){
        $setting = CalendarSetting::find(1);
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
      if($setting->slot_mode==0){ 
          foreach($period as $date) {   
             $booked_date = $date->format($format);  
            //  $bookings = DB::table('bookings')->where('package_id',$package_id)->whereIn('status',['Yes','yes'])->whereDate('booking_date','=',$booked_date)->count(); 
             $bookings = DB::table('bookings')->whereIn('status', ['Yes', 'yes'])->where('booking_date','=',$booked_date)->count();  
             //var_dump($bookings);
            if($bookings>0){
                if($cslot==$slots ) {              
                    $array[] =  $booked_date;
                }else if(($cslot + $bookings) >=$slots){
                    $array[] =  $booked_date;
                }     
            }     
          } 
      }else{
          
        foreach($period as $date) {  
             $booked_date = $date->format($format); 
             $formattedDate = \DateTime::createFromFormat('d-m-Y', $booked_date)->format('Y-m-d');
            // Get the day number (0 for Sunday to 6 for Saturday)
            $dayNumber = date('w', strtotime($formattedDate));
            $dateslots = (new DaySlots)->getTimeslot($dayNumber,'normal');
            $slots = $dateslots->count();
            //  $bookings = DB::table('bookings')->where('package_id',$package_id)->whereIn('status',['Yes','yes'])->whereDate('booking_date','=',$booked_date)->count(); 
             $bookings = DB::table('bookings')->whereIn('status', ['Yes', 'yes'])->where('booking_date','=',$booked_date)->count();  
             //var_dump($bookings);
            if($bookings>0){
                if($cslot==$slots ) {              
                    $array[] =  $booked_date;
                }else if(($cslot + $bookings) >=$slots){
                    $array[] =  $booked_date;
                }     
            }     
          }   
      }
     
      // Return the array elements 
      return $array; 

    }
   public static function getBookedDatewithSlots($format = 'd-m-Y', $start, $end, $post = array()) {
    $setting = CalendarSetting::find(1);
    $package_id = $post->id;
    $slots = count($post->slots); 
    //dd($post->slots);
    $sid_arr = [];
     $sid_r_arr = [];
    if ($post->slots) {
        foreach ($post->slots as $sst) {
            if($sst->slot_type=="normal"){
                 $sid_arr[] = $sst->id; // Add slot IDs to the array
            }else{
                 $sid_r_arr[] = $sst->id; // Add slot IDs to the array 
            }
           
        }
    }
    //dd($sid_r_arr);
    $array = array(); 

        try {
            // Define 1-day interval
            $interval = new \DateInterval('P1D'); 
    
            // End date + 1 day to include the final day
            $realEnd = new \DateTime($end); 
            $realEnd->add($interval); 
    
            // Period between start and end dates
            $period = new \DatePeriod(new \DateTime($start), $interval, $realEnd); 
     
         if($setting->slot_mode==0){ 
            // Loop through each day in the period
            foreach ($period as $date) {   
                $booked_date = $date->format($format); 
                $formattedDate = \DateTime::createFromFormat('d-m-Y', $booked_date)->format('Y-m-d');
               //->whereIn('timeslot_id', []);
                if(isset($booked_date) && MainAction::getRamadanDate($formattedDate)==1){
                    $bookings = DB::table('bookings')
                    ->whereIn('status', ['Yes', 'yes'])
                   ->whereIn('timeslot_id', $sid_r_arr)
                    ->where('booking_date', '=', $booked_date)
                    ->count(); 
                    $slots = count($sid_r_arr);
                     if ($bookings > 0 && $slots <= $bookings) {              
                            $array[] = $booked_date;
                     }else if (empty($sid_r_arr) ){
                            $array[] = $booked_date;
                     }
                }else{
                    $bookings = DB::table('bookings')
                    ->whereIn('status', ['Yes', 'yes'])
                   ->whereIn('timeslot_id', $sid_arr)
                    ->where('booking_date', '=', $booked_date)
                    ->count(); 
                    $slots = count($sid_arr);
                     if ($bookings > 0 && $slots <= $bookings) {              
                        $array[] = $booked_date;
                     }else if (empty($sid_arr) ){
                        $array[] = $booked_date;
                    }
                }
                // $bookings = DB::table('bookings')
                //     ->whereIn('status', ['Yes', 'yes'])
                //   ->whereIn('timeslot_id', $sid_arr)
                //     ->where('booking_date', '=', $booked_date)
                //     ->count();  
   
                // if ($bookings > 0 && $slots <= $bookings) {              
                //     $array[] = $booked_date;
                // }else if (empty($sid_arr) ){
                    
                // }
                
            }
         }else{
            foreach ($period as $date) {   
                $booked_date = $date->format($format); 
                $formattedDate = \DateTime::createFromFormat('d-m-Y', $booked_date)->format('Y-m-d');
                // Get the day number (0 for Sunday to 6 for Saturday)
                $dayNumber = date('w', strtotime($formattedDate));
                if(isset($booked_date) && MainAction::getRamadanDate($formattedDate)==1){
                    $dateslots = (new DaySlots)->getTimeslot($dayNumber,'ramadan');
                    $slots = $dateslots->count();
                }else{
                   $dateslots = (new DaySlots)->getTimeslot($dayNumber,'normal');
                   $slots = $dateslots->count(); 
                }
                $bookings = DB::table('bookings')->whereIn('status', ['Yes', 'yes'])->where('booking_date', '=', $booked_date)->count();  
                if ($bookings > 0 && $slots <= $bookings) {              
                    $array[] = $booked_date;
                }else if($slots==0){
                   $array[] = $booked_date; 
                }     
            } 
         }
    
            // Return the array of booked dates
            return $array;
    
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            dd($e->getMessage());
            return ['error' => $e->getMessage()];
            
        }
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

 static function getRamadanDate($bookingDate){
      
        $settings = Setting::all()->toArray();
        
        $config=array();
        foreach($settings as $setting){
            $config[$setting["field_key"]] = $setting["field_value"];
        }
        $setting =(object)$config;
       
        $paymentDate=date('Y-m-d', strtotime($bookingDate));
        //echo $paymentDate; // echos today!
        $contractDateBegin = date('Y-m-d', strtotime($setting->ramadan_start_date));
        $contractDateEnd = date('Y-m-d', strtotime($setting->ramadan_end_date));
       
        if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)){
           // echo "is between";
           //dd( $contractDateEnd); 
            return 1;
            //dd('is between');
        }else{
            //echo "NO GO!";  
            return 0;
            //dd('NO GO!');
        }
    }
    

}
