<?php

namespace Sbhadra\Calendar\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Calendar\Models\Calendar;
use Illuminate\Http\Request;

class AjaxController extends BackendController
{
    public function getBookingJson(Request $request){
        $start = $_REQUEST['start'];
        $end = $_REQUEST['end'];
        //$bookings = Booking::where('status','Yes')->get();
        $bookings = Booking::whereIn('status',['Yes','yes','completed','cancel'])->get();
        $calendar_dates = Calendar::all();
        $data = array();
        if($bookings){

            foreach($bookings as $key=>$booking){
                $color='#00BFFF';
                $extext = '';
                $time_from = '';
                $time_to = '';
                if(isset($booking->timeslot['starttime'])){
                    $time_from = $booking->timeslot['starttime'];
                }
                if(isset($booking->timeslot['endtime'])){
                    $time_to = $booking->timeslot['endtime'];
                }
                if($booking->status=='No'){
                    $color='#ffa500';
                }
                if($booking->status=='cancel'){
                    $color='#cc0000';
                }
                if($booking->status=='completed'){
                    $color='#008000';
                }
                if($booking->status=='Yes' || $booking->status=='yes' ){
                    $color='#00BFFF';
                }
                
                $data[] = array(
                    'id'   => $booking->id,
                    'title'   =>$booking->title.'<br>'.$booking->customer_name.'['.$time_from.'-'.$time_to.']-'.$booking->mobile_number,
                    'start'   =>date('Y-m-d', strtotime($booking->booking_date)) ,
                    'description'   =>'',
                    'textColor'=> '#FFF',
                    'color'=>  $color,
                    'className'=> 'event-full',
                    'url'=> route('admin.bookings.view', [$booking->id])
                   );
            }
        }
        if($calendar_dates){
            foreach($calendar_dates as $key=>$date){
                $data[] = array(
                    'id'   => $date->id,
                    'title'   =>'Close date',
                    'start'   =>$date->from_date ,
                    'end'   => $date->to_date,
                    'allDay'=> true,
                    'rendering'=> 'background',
                    'backgroundColor'=> '#d9534f',
                    'textColor'=> '#FFF',
                    //'color'=> '#00BFFF',
                    'className'=> 'event-full'
                   );
            }
        }
        echo json_encode($data);
        exit;
    }
}
