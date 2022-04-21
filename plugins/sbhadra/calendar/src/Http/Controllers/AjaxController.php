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
        $bookings = Booking::where('status','Yes')->get();
        $calendar_dates = Calendar::all();
        $data = array();
        if($bookings){

            foreach($bookings as $key=>$booking){
                $time_from = '';
                $time_to = '';
                if(isset($booking->timeslot['starttime'])){
                    $time_from = $booking->timeslot['starttime'];
                }
                if(isset($booking->timeslot['endtime'])){
                    $time_to = $booking->timeslot['endtime'];
                }
                
               
                $data[] = array(
                    'id'   => $booking->id,
                    'title'   =>$booking->title.'-'.$booking->customer_name.'['.$time_from.'-'.$time_to.']',
                    'start'   =>date('Y-m-d', strtotime($booking->booking_date)) ,
                    'description'   =>'',
                    //'end'   => $booking->booking_date,
                    //'allDay'=> true,
                    //'rendering'=> 'background',
                    //'backgroundColor'=> '#F00',
                    'textColor'=> '#FFF',
                    'color'=> '#00BFFF',
                    'className'=> 'event-full'
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
