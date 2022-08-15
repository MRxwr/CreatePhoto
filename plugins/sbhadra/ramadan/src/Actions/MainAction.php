<?php

namespace Sbhadra\Ramadan\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Timeslot;
use Sbhadra\Photography\Models\Setting;
use Sbhadra\Calendar\Models\Calendar;
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
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'addConfigRamadanAction']);
        $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'addRamadanTimefields']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'frontRamadanTimefields']);
        
    }
    public function addConfigRamadanAction(){
        HookAction::addAdminMenu(
            'Ramadan Slots',
            'timeslot/ramadan',
            [
                'icon' => 'fa fa-cog',
                'position' => 15,
                'parent' => 'timeslots',
            ]
        );
    }
   
    public function addRamadanTimefields($model){
        add_action('post_type.timeslots.form.right', function($model) {
            $html = '<div class="form-group">
            <label class="control-label mb-10 text-left">Slot Type</label>
                <select class="form-control" name="slot_type" id="slot_type">';
                $normal ='';
                $ramadan  ='';
                if( $model->slot_type=='normal'){
                    $normal = 'selected="selected"';
                }else if( $model->slot_type=='ramadan'){
                    $ramadan = 'selected="selected"';
                }else{
                    $ramadan  ='';
                    $normal  ='';
                }  
                $html .= '<option value="normal" '.$normal.' >Normal</option>';
                $html .= '<option value="ramadan" '.$ramadan.'  >Ramadan</option>';
                $html .= '</select>
        </div>';
           echo  $html;
        }, 10, 1);
        
    }
    public function frontRamadanTimefields(){
        if(isset($_REQUEST['date']) && $this->getRamadanDate($_REQUEST['date'])==1){
           //$times=  Timeslot::where('slot_type','ramadan')->get();
           
              add_filters('theme.reservation.time', function() {
                
                $package = Package::find($_REQUEST['id']);
                $package->ramadan_slots = Timeslot::where('slot_type','ramadan')->get();
                //dd($package->slots);
                   return $this->getPackageTimeslots($package);
               }, 10, 1);      
        }
        
           
         add_filters('cstudio.reservation.time', function() {
            $package = Package::find($_REQUEST['id']);
            return $this->getPackageTimeslots($package);
               //return $this->getPackageCstudioTimeslots($package);
           }, 10, 1);

    }

    static function getPackageTimeslots($package){
        $html ='';
        $disable_slots=array();
        if(isset($_REQUEST['date'])){
            $package = Package::find($_REQUEST['id']);
            $package->ramadan_slots = Timeslot::where('slot_type','ramadan')->get();
            $date = new \DateTime($_REQUEST['date']);
            $bdate = $date->format('Y-m-d');
            $calendar = Calendar::where('package_id',$package->id)->whereDate('from_date', '<=', $date)->whereDate('to_date', '>=', $date)->first();
            if($calendar){
                $disable_slots = json_decode($calendar->slots);
            }
           // $booked_slot =Booking::where('package_id',$package->id)->where('booking_date',$_REQUEST['date'])->where('status','yes')->pluck('timeslot_id')->toArray();
            $booked_slot =Booking::where('booking_date',$_REQUEST['date'])->where('status','yes')->pluck('timeslot_id')->toArray();
        }else{
            //$booked_slot =Booking::where('package_id',$package->id)->where('status','yes')->pluck('timeslot_id')->toArray();
            $booked_slot =Booking::where('status','yes')->pluck('timeslot_id')->toArray();
            
        }
        //dd($disable_slots);
        
        if($package->ramadan_slots){
            $html .='<div class="col-xxl-8 pe-xl-5 pt-4"><div class="personal-form row">';
            $html .=' <div class="col-xxl-10 pb-3"><label for="" >'.trans('theme::app.Preffered_Time').':</label>';
            //$html .='<div class="col-sm-7 col-md-8">';
            $html .='<select class="form-control border" id="booking_time" name="booking_time"  required>';
            $html .='<option>'.trans('theme::app.Select_Time').'</option>';
             foreach($package->ramadan_slots as $slot){
                if(!in_array($slot->id,$disable_slots)){
                    if(!in_array($slot->id,$booked_slot)){
                        $html .='<option value="'.$slot->id.'">'.$slot->starttime.' - '.$slot->endtime.'</option>';
                    }
                 }
               }
            $html .='</select>';
            $html .='</div>';
            $html .='</div>';
            $html .='</div>';
        }
        return $html;
    }


    static function getAdminPackageTimeslots($package){
        $html ='';
        $disable_slots=array();
        if(isset($_REQUEST['date'])){
            $date = new \DateTime($_REQUEST['date']);
            $bdate = $date->format('Y-m-d');
            $calendar = Calendar::where('package_id',$package->id)->whereDate('from_date', '<=', $date)->whereDate('to_date', '>=', $date)->first();
            if($calendar){
                $disable_slots = json_decode($calendar->slots);
            }
            //$booked_slot =Booking::where('package_id',$package->id)->where('booking_date',$_REQUEST['date'])->where('status','yes')->pluck('timeslot_id')->toArray();
            $booked_slot =Booking::where('booking_date',$_REQUEST['date'])->where('status','yes')->pluck('timeslot_id')->toArray();
        }else{
            //$booked_slot =Booking::where('package_id',$package->id)->where('status','yes')->pluck('timeslot_id')->toArray();
            $booked_slot =Booking::where('status','yes')->pluck('timeslot_id')->toArray();
        }
        
        //dd($booked_slot);
        if($package->slots){
            $html .='<div class="form-group row">';
            $html .='<label class="col-sm-5 col-md-4" for="" >'.trans('sbph::app.Preffered_Time').':</label>';
            $html .='<div class="col-sm-7 col-md-8">';
            $html .='<select class="form-control border" id="booking_time" name="booking_time"  required>';
             foreach($package->slots as $slot){
                if(!in_array($slot->id,$disable_slots)){
                    if(!in_array($slot->id,$booked_slot)){
                        $html .='<option value="'.$slot->id.'">'.$slot->starttime.' - '.$slot->endtime.'</option>';
                    }
                 }
               }
            $html .='</select>';
            $html .='</div>';
            $html .='</div>';
            
        }
        return $html;
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
