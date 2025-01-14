<?php

namespace Sbhadra\Photography\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Juzaweb\Http\Controllers\FrontendController;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Timeslot;
use Sbhadra\Photography\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PaymentController extends FrontendController
{
    public function doPayment()
    {
        $settings = Setting::all()->toArray();
        $config=array();
        foreach($settings as $setting){
            $config[$setting["field_key"]] = $setting["field_value"];
        }

        $payment_data = array();
        $payment_data= $request = \Request::all();
        $package = Package::find($request['id']);
        $payment_data['package_name'] = $package->title;
        $package_price=$package->price;
        $time = Timeslot::find($request['booking_time']);
        $bsid=base64_encode($package->id);
        if(!empty($request['service_item'])){
            $services = Service::whereIn('id', $request['service_item'])->get();
        }
        $booking_price =$package_price;
        // foreach($services as $service){
        //     $booking_price =$booking_price+$service->price;
        // }
        sleep(5);
         $book = DB::table('bookings')->where('package_id',$package->id)->where('booking_date','=',$request['booking_date'])->where('timeslot_id',$request['booking_time'])->whereIn('status',['Yes','yes'])->count();
        if($book>0){
            header("Location: ".url('payment/failed').'/?bsid='.$bsid);
            exit();
        }
        $payment_data['booking_price'] =$booking_price;
        $total = 0.00;
        if(isset($payment_data['total_price'])){
            $total = $payment_data['total_price'];
        }
        if(isset($payment_data['discount_value'])){
            $total = $total - $payment_data['discount_value'];
        }
        
     
        //$payment_data['pay_amount'] =$total;
       // $payment_data['pay_amount'] =35.500;

    //   if(isset($config['payment_type']) AND $config['payment_type']==1){
    //       $pay_amount = $config['pay_amount'];
    //       $payment_data['pay_amount'] =$pay_amount;
    //     }else{
    //       $payment_data['pay_amount'] =$total;  
    //     }
        
        
       if(isset($config['payment_type']) AND $config['payment_type']==1){
           if($total<=0){
              $payment_data['pay_amount'] =$total;  
              $initial_payment=$total;
              $rest_of_payment =0.000;
              $payment_status ='full'; 
           }else{
              $pay_amount = $config['pay_amount'];
              if($total>$pay_amount){
                  $payment_data['pay_amount'] = $pay_amount;
                  $initial_payment=$pay_amount;
                  $rest_of_payment = $total - $config['pay_amount'];
                  $payment_status ='partial';
              }else{
                   $payment_data['pay_amount'] = $total;  
                   $initial_payment=$total;
                   $rest_of_payment =0.000;
                   $payment_status ='full';
              }
           }
          
        }else{
           $payment_data['pay_amount'] = $total;  
           $initial_payment=$total;
           $rest_of_payment =0.000;
           $payment_status ='full';
        }
        
        $booking = new Booking;
        $booking->package_id = $package->id;
        $booking->slug = 'CPBK'.time();
        $booking->title = 'CPBK'.time();
        $booking->booking_date = $request['booking_date'];
        $booking->timeslot_id = $request['booking_time'];
        $booking->booking_price = $booking_price;
        $booking->customer_name = $request['customer_name'];
        $booking->mobile_number = $request['mobile_number'];
        $booking->baby_name = $request['baby_name'];
        $booking->baby_age = $request['baby_age'];
        $booking->address = $request['address'];
        $booking->initial_payment = $initial_payment;
        $booking->rest_of_payment =$rest_of_payment;
        $booking->payment_status = $payment_status;
        $booking->instructions = $request['instructions'];
        $booking->status = 'No';
        if($booking->save()){
            if(!empty($request['service_item'])){
             $booking->services()->sync($request['service_item']);
            }
              $payment_data['booking_id'] = $booking->id;
              Session::put('booking_data', $booking);
              session(['booking_data' => $booking]);
              $status = do_action('theme.booking.extra',$payment_data);
              $status = do_action('theme.payment.method',$payment_data);
         }
    }
    public function doSuccess(){
        $status = do_action('theme.payment.method_success');
    }
    public function doFailed(){
        $status = do_action('theme.payment.method_failed');
    }



}
