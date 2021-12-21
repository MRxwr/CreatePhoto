<?php

namespace Sbhadra\Photography\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Juzaweb\Http\Controllers\FrontendController;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Timeslot;
use Illuminate\Http\Request;

class PaymentController extends FrontendController
{
    public function doPayment()
    {
        $payment_data = array();
        $payment_data= $request = \Request::all();
        $package = Package::find($request['id']);
        $package_price=$package->price;
        $time = Timeslot::find($request['booking_time']);
        $services = Service::whereIn('id', $request['service_item'])->get();
        $booking_price =$package_price;
        foreach($services as $service){
            $booking_price =$booking_price+$service->price;
        }
        $payment_data['booking_price'] =$booking_price;
        $booking = new Booking;
        $booking->package_id = $package->id;
        $booking->booking_date = $request['booking_date'];
        $booking->booking_date = $request['booking_time'];
        $booking->booking_price = $booking_price;
        $booking->customer_name = $request['customer_name'];
        $booking->mobile_number = $request['mobile_number'];
        $booking->baby_name = $request['baby_name'];
        $booking->baby_age = $request['baby_age'];
        $booking->instructions = $request['instructions'];
        if($booking->save()){
            $payment_data['booking_id'] = $booking->id;
            do_action('theme.payment.method',$payment_data);
         }

    }
    public function doSuccess(){

    }
    public function doFailed(){

    }

}
