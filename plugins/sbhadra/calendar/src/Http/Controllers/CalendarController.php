<?php

namespace Sbhadra\Calendar\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Calendar\Models\Calendar;
use Sbhadra\Calendar\Models\CalendarSetting;
use Sbhadra\Photography\Models\Timeslot;
use Sbhadra\Photography\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends BackendController
{
    public function index()
    {
        $packages = Package::get();
        $model= '';
        $dates=array();
        $slots = Timeslot::where('is_deleted',0)->get();
        if(isset($_REQUEST['package'])){
            $model = Package::where('id',$_REQUEST['package'])->first();
            //dd($slots);
            $dates = Calendar::where('package_id',$_REQUEST['package'])->get();
        }else{
            $dates = Calendar::where('package_id',0)->get();
        }
        
        return view('sbca::backend.calendar.index', [
            'title' => 'Booking Calendar',
            'packages'=>$packages,
            'model'=>$model,
            'dates'=>$dates,
            'slots'=>$slots,
        ]);
    }
    public function setting()
    {   
        $slots = Timeslot::where('is_deleted',0)->get();
        $days=array(0,1,2,3,4,5,6);
        $active_slots=[];
        foreach($days as $key){
            $active_slots[$key] = DB::table('day_slots')->where('day_key', $key)->where('status',1)->pluck('slot_id')->toArray();
        }
       //dd($active_slots);
        $setting = CalendarSetting::find(1);   
        return view('sbca::backend.calendar.setting', [
            'title' => 'Booking Calendar',
            'setting'=>$setting,
            'slots'=>$slots,
            'active_slots'=>$active_slots,
        ]);
    }
    public function dateSave(Request $request)
    {
       // dd($request->all());
        $date = new Calendar;
        $date ->from_date = $request->start_date;
        $date ->to_date = $request->end_date;
        $date ->package_id = $request->package_id;
        if(!empty($request->slots)){
            $date ->slots = json_encode($request->slots);
        }else{
            $date ->slots ='all'; 
        }
        
        $date->status ='Yes';
        $date ->save();
        return $this->success([
            'message' => trans('sbca::app.saved_successfully'),
            'redirect' => route('admin.booking-calendar'),
        ]);
    }
    public function settingSave(Request $request)
    {
        //dd($request->all());
        $setting = CalendarSetting::find(1);
        $setting ->start_date = $request->start_date;
        $setting ->end_date = $request->end_date;
        $setting ->close_days = $request->close_days;
        $setting ->default_color = $request->default_color;
        $setting ->select_color = $request->select_color;
        $setting ->offday_color = $request->offday_color;
        $setting ->fullbook_color = $request->fullbook_color;
        $setting ->slot_mode = $request->slot_mode;
        $setting ->booking_per_slot = $request->booking_per_slot;
        $setting ->cwith_days = $request->cwith_days;
        if(!empty($request->slots)){
            $days=array(0,1,2,3,4,5,6);
                foreach($days as $nKey){
                    if(DB::table('day_slots')->where('day_key', $nKey)->first()){
                       DB::table('day_slots')->where('day_key', $nKey)->update(['status'=>0]); 
                    }
                }
            foreach($request->slots as $key=>$slots){
                   
                foreach($slots as $slot){
                    $existingRecord = DB::table('day_slots')->where('day_key', $key)->where('slot_id', $slot)->first();
                    
                    if ($existingRecord) {
                        // Record exists, update it
                        DB::table('day_slots')->where('day_key', $key)->where('slot_id', $slot)->update(['status'=>1]);
                    } else {
                        // Record does not exist, insert it
                        DB::table('day_slots')->insert([
                            'day_key' => $key,
                            'slot_id' => $slot,
                            'status' => 1,
                            'created_at' => now(),
                            'updated_at' => now(),
                            // Add other fields from $data array
                        ] );
                    }
                }
            }
                
            
           
        }
        $setting ->save();
        return $this->success([
            'message' => trans('sbca::app.saved_successfully'),
            'redirect' => route('admin.calendar-setting'),
        ]);
    }
    public function delete(Request $request,$id){
        $date=Calendar::find($id);
        $date->delete();
        return $this->success([
            'message' => 'Date successfully deleted',
            'redirect' => route('admin.booking-calendar'),
        ]);

    }
}
