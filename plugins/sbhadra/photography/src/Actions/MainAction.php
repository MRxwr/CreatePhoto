<?php

namespace Sbhadra\Photography\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Photography\Models\Package;
use Sbhadra\Photography\Models\Service;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Timeslot;
use Sbhadra\Photography\Http\Controllers\PaymentController;
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
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerPackage']);
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerBooking']);
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerTaxonomies']);
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'getBookingDetailsAjax']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addPackagesInHomepage']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addReservationHooks']);
        $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'addDoPaymentsAction']);
        $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'getCalenderHooksAdmin']);
        $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'addReservationHooksAdmin']);
        $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'GetDashboardHooks']);
    }

    public function registerPackage()
    {
        HookAction::registerPostType('packages', [
            'label' => trans('sbph::app.packages'),
            'model' => Package::class,
            'menu_position' => 32,
            'menu_icon' => 'fa fa-list',
        ]);
        HookAction::registerPostType('services', [
            'label' => trans('sbph::app.services'),
            'model' => Service::class,
            'menu_position' => 34,
            'menu_icon' => 'fa fa-list',
        ]);
        HookAction::registerPostType('timeslots', [
            'label' => trans('sbph::app.timeslots'),
            'model' => Timeslot::class,
            'menu_position' => 34,
            'menu_icon' => 'fa fa-list',
        ]);
    }
    public function addPackagesInHomepage()
    {
        $this->addAction('theme.home_packages', function () {
            $packages = Package::where('status','publish')->get();
            if($packages){
                //var_dump($packages);
                foreach($packages as $key=>$package){
                    echo '<div class="col-md-6 col-sm-6 col-12">
                    <a href="'.url('package/'.$package->slug).'">
                    <div class="package-card card m-2">
                      <div class="card-body p-2">
                        <div class="row align-items-center no-gutters">
                          <div class="col-lg-7 col-md-8 col-sm-12 order-lg-1 order-md-1 order-sm-2 order-2">
                          <h5 class="package-head">'.$package->title.'</h5>
                            '.$package->content.'                    
                            <p class="theme-color package-price-tag text-right"><span>Price:</span><span class="ml-2">'.$package->price.' KD</span></p>
                          </div>
                          <div class="col-lg-5 col-md-4 order-lg-3 order-md-2 order-sm-1 order-1">
                            <img src="'. upload_url($package->thumbnail) .'" class="img-rounded img-fluid d-block mx-auto mb-md-0 mb-3">
                          </div>
                        </div>
                      </div>
                    </div>
                    </a>
                  </div>';
                }
             }
        });

    }
    public function addReservationHooks(){
        
        if(\Request::segment(1) =="reservations" && !empty($_REQUEST)){
            if(isset($_REQUEST['id'])){
              $package = Package::find($_REQUEST['id']);
                add_filters('theme.reservation.data', function($type) {
                    $theme_field='';
                    $package = Package::find($_REQUEST['id']);
                      if(isset($_REQUEST['theme_id'])){
                        $theme_field ='<input type="hidden" id="theme_id" name="theme_id" value="'. $_REQUEST['theme_id'].'" />';
                      }
                      return '<input type="hidden" id="id" name="id" value="'. $package->id.'" />
                                '.$theme_field.'
                                <input type="hidden" id="booking_price" name="package_price" value="'. $package->price.'" />
                            <div class="col-sm-12 pe-xl-5">
                                <div class="package-head bg-light radius15 mh53 py-1 px-3 mb-3 d-inline-flex align-items-center">
                                    <h4 class="fs23"> Package Chosen: '. $package->title.'</h4>
                                    <input type="hidden" readonly class="form-control-plaintext" id="" value="'. $package->title.'">
                                </div>
                            </div>
                            <div class="col-sm-12 pe-xl-5">
                                <div class="package-head bg-light radius15 mh53 py-1 px-3 mb-3 d-inline-flex align-items-center">
                                    <h4 class="fs23"> Date: '.$_REQUEST['date'].'</h4>
                                    <input type="hidden" readonly class="form-control-plaintext" name="booking_date" id="booking_date" value="'.$_REQUEST['date'].'">
                                </div>
                            </div>';
               }, 10, 1);

               add_filters('theme.reservation.time', function() {
                $package = Package::find($_REQUEST['id']);
                   return $this->getPackageTimeslots($package);
               }, 10, 1);
               
             add_filters('cstudio.reservation.time', function() {
                $package = Package::find($_REQUEST['id']);
                   return $this->getPackageCstudioTimeslots($package);
               }, 10, 1);
               
               add_filters('theme.reservation.services', function() {
                $package = Package::find($_REQUEST['id']);
                   return $this->getPackageExService($package);
               }, 10, 1);

               add_filters('cstudio.reservation.services', function() {
                $package = Package::find($_REQUEST['id']);
                   return $this->getPackageCstudioExService($package);
               }, 10, 1);

 
            }
        }
    }
    public function addReservationHooksAdmin(){

            if(isset($_REQUEST['id'])){
              $package = Package::find($_REQUEST['id']);
               $this->addAction('admin.reservation.data', function() {
                $package = Package::find($_REQUEST['id']);
                echo '<input type="hidden" id="package_id" name="package_id" value="'. $package->id.'" />
                        <input type="hidden" id="package_price" name="package_price" value="'. $package->price.'" />
                        <div class="form-group row">
                            <label for="" class="col-sm-5 col-md-4 col-form-label">Package Choosen:</label>
                            <div class="col-sm-7 col-md-8">
                                <input type="text" readonly class="form-control-plaintext" id="" value="'. $package->title.'">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-5 col-md-4 col-form-label">Date:</label>
                        <div class="col-sm-7 col-md-8">
                        <input type="text" readonly class="form-control-plaintext" name="booking_date" id="booking_date" value="'.$_REQUEST['date'].'">
                    </div>
                   </div>';
           }, 10, 1);

           $this->addAction('admin.reservation.time', function() {
            $package = Package::find($_REQUEST['id']);
               echo $this->getPackageTimeslots($package);
           }, 10, 1);

           $this->addAction('admin.reservation.services', function() {
            $package = Package::find($_REQUEST['id']);
               echo $this->getPackageExService($package);
           }, 10, 1);

 
            }
        
    }
    public function registerBooking()
    {
        HookAction::registerPostType('bookings', [
            'label' => trans('sbph::app.bookings'),
            'model' => Booking::class,
            'menu_position' => 36,
            'menu_icon' => 'fa fa-list',
        ]);
    }
    public function registerTaxonomies()
    {
        HookAction::registerTaxonomy('types', 'packages', [
            'label' => trans('sbph::app.types'),
            'menu_position' => 6, 
        ]); 
    }

    static function getPackageTimeslots($package){
        $html ='';
        $booked_slot =Booking::where('package_id',$package->id)->where('status','yes')->pluck('timeslot_id')->toArray();
        //dd($booked_slot);
        if($package->slots){
            $html .='<div class="form-group row">';
            $html .='<label for="" class="col-sm-5 col-md-4 col-form-label">Preffered Time:</label>';
            $html .='<div class="col-sm-7 col-md-8">';
            $html .='<select class="form-control form-control-lg" id="booking_time" name="booking_time" style="max-width: 300px;" required>';
            $html .='<option value=""  >Select Time</option>';
             foreach($package->slots as $slot){
                if(!in_array($slot->id,$booked_slot)){
                    $html .='<option value="'.$slot->id.'">'.$slot->starttime.' - '.$slot->endtime.'</option>';
                }
               }
            $html .='</select>';
            $html .='</div>';
            $html .='</div>';
        }
        return $html;
    }

static function getPackageCstudioTimeslots($package){
        $html ='';
        $booked_slot =Booking::where('package_id',$package->id)->where('status','yes')->pluck('timeslot_id')->toArray();
        //dd($booked_slot);
        if($package->slots){
           
            $html .='<div class="col-sm-12 pe-xl-5">';
            $html .='<div class="package-head bg-light radius15 mh53 py-1 px-3 mb-3 d-inline-flex align-items-center">';
            $html .='<h4 class="fs23">Available Time Slots:</h4><input type="hidden" id="booking_time" name="booking_time">';
            $html .='</div></div>';
            $html .='<div class="col-sm-12 pe-xl-5 timeSelect">';
             foreach($package->slots as $slot){
                if(!in_array($slot->id,$booked_slot)){
                    $html .='<div id="'.$slot->id.'" class="package-head open_time bg-white border radius15 mh53 py-1 px-2 mb-3 me-2 d-inline-flex align-items-center">
                    '.$slot->starttime.' - '.$slot->endtime.'
                        </div>';
                    
                }else{
                    $html .='<div id="'.$slot->id.'" class="package-head disable bg-white border radius15 mh53 py-1 px-2 mb-3 me-2 d-inline-flex align-items-center">
                    '.$slot->starttime.' - '.$slot->endtime.'
                        </div>';
                }
               }
            
            $html .='</div>';
        }
        return $html;
    }

    

    static function getPackageExService($package){
        $html ='';
        if($package->services){
            $html .='<div class="form-group row">';
            $html .='<label for="" class="col-sm-5 col-md-4 col-form-label">Preffered Time:</label>';
            $html .='<div class="col-sm-7 col-md-8">';
             foreach($package->services as $service){
               $html .='<div class="form-check">
               <input class="form-check-input" type="checkbox" value="'.$service->id.'" name="service_item[]">
               <label class="form-check-label" for="defaultCheck1">
                 <span class="form-control-plaintext">'.$service->title.' - '.$service->price.' KD.</span>
               </label>
             </div>';
             }
            $html .='</div>';
            $html .='</div>';
        }
        return $html;
    }

    static function getPackageCstudioExService($package){
        $html ='';
        if($package->services){                     
            $html .='<div class="col-sm-12 pe-xl-5 pt-4">';
            $html .='<div class="package-head bg-light radius15 mh53 py-1 px-3 mb-4 d-inline-flex align-items-center">';
            $html .='<h4 class="fs23">Extras:</h4>';
            $html .='</div></div>';
            $html .='<div class="col-xxl-9">';
            $html .='<div class="row px-xl-2">';
                                      
             foreach($package->services as $service){
                $html .='<div class="col-xxl-6 mb-xl-5 mb-3">'; 
                $html .='<label class="container_radio d-flex align-items-center">
                    Extra Charge For '.$service->title.'
                    <input type="checkbox" class="xprice" data-exprice="'.$service->price.'" value="'.$service->id.'" name="service_item[]">
                    <span class="checkmark"></span>
                        <div class="bg-light text-dark radius15 mh53 py-1 px-3 ms-2 d-inline-flex align-items-center">
                            <h4 class="fs23">
                            '.$service->price.' KD
                            </h4>
                        </div>
                  </label>';
                $html .='</div>';

             }
            $html .='</div>';
            $html .='</div>';
        }
        return $html;
    }

    public function addDoPaymentsAction(){
        $this->addAction('theme.payment.index', function () {
             app('Sbhadra\Photography\Http\Controllers\PaymentController')->doPayment();
        });
        $this->addAction('theme.payment.success', function () {
            app('Sbhadra\Photography\Http\Controllers\PaymentController')->doSuccess();
       });
       $this->addAction('theme.payment.failed', function () {
            app('Sbhadra\Photography\Http\Controllers\PaymentController')->doFailed();
         });
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
                 $datesDisabled_array =array();
                 foreach($bookings as $booking){
                    if($booking->total ==$slots ){
                        $datesDisabled_array[] =  $booking->booking_date;
                    }
                 }
               $datesDisabled = implode(',', $datesDisabled_array );
            return '<script>
                   var datesDisabled = ['.$datesDisabled.'];
               </script>';
       }, 10, 1);
        
    }

    public function getCalenderHooksAdmin(){
        $this->addAction('admin.calendar.hooks', function(){
            if(isset($_REQUEST['id'])){
            $post = Package::find($_REQUEST['id']);
            //var_dump($post);
             $package_id = $post->id; 
            $slots = count($post->slots);
            $bookings = DB::table('bookings')
                 ->select('booking_date', DB::raw('count(*) as total'))
                 ->where('status','Yes')
                 ->where('package_id',$package_id)
                 ->groupBy('booking_date')
                 ->get();  
                 $datesDisabled_array =array();
                 foreach($bookings as $booking){
                    if($booking->total ==$slots ){
                        $datesDisabled_array[] =  $booking->booking_date;
                    }
                 }
               $datesDisabled = implode(',', $datesDisabled_array );
            echo '<script>
                   var datesDisabled = ['.$datesDisabled.'];
               </script>';
                }
       }, 10, 1);
        
    }

    public   function GetDashboardHooks(){
        $this->addAction('backend.dashboard.view', function () {
            $html ='<div class="row">';
             $incomplete_booking =Booking::where('status','No')->count();
            $html .='<div class="col-md-3">
                        <div class="card  border-0 bg-gray-2">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center">
                                    <i class="fa fa-list font-size-50 mr-3"></i>
                                    <div>
                                        <div class="font-size-21 font-weight-bold">'. trans('sbph::app.total_incomplete_bookings').'</div>
                                        <div class="font-size-15">'.$incomplete_booking.'</div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>';
            $success_booking =Booking::where('status','Yes')->count();
            
            $html .='<div class="col-md-3">
                        <div class="card  border-0 bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center">
                                    <i class="fa fa-list font-size-50 mr-3"></i>
                                    <div>
                                        <div class="font-size-21 font-weight-bold">'.trans('sbph::app.total_success_bookings').'</div>
                                        <div class="font-size-15">'.$success_booking.'</div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>';
            $complete_booking =Booking::where('status','Completed')->count();
            $html .='<div class="col-md-3">
                        <div class="card  border-0 bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center">
                                    <i class="fa fa-list font-size-50 mr-3"></i>
                                    <div>
                                        <div class="font-size-21 font-weight-bold">'.trans('sbph::app.total_complete_bookings').'</div>
                                        <div class="font-size-15">'.$complete_booking.'</div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>';
            
            $cancel_booking =Booking::where('status','cancel')->count();
            $html .='<div class="col-md-3">
                        <div class="card  border-0 bg-danger text-white">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center">
                                    <i class="fa fa-list font-size-50 mr-3"></i>
                                    <div>
                                        <div class="font-size-21 font-weight-bold">'.trans('sbph::app.total_cancel_bookings').'</div>
                                        <div class="font-size-15">'.$cancel_booking.'</div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>';
            
            $html .='</div>';

            echo $html;
       });
       
    } 
    
    public function getBookingDetailsAjax(){
        if(isset($_REQUEST['ajaxpage']) && $_REQUEST['ajaxpage']=='getBookingDetailsAjax'){
           $searchquery = $_REQUEST['searchquery'];
           $bookings = Booking::where('transaction_id',$searchquery)->get();
           if(!$bookings->isEmpty()){
            echo $this->bookingViewRander($bookings);
           }else{
               $bookings = Booking::where('title',$searchquery)->get();
               if(!$bookings->isEmpty()){
                   echo $this->bookingViewRander($bookings);
                }else{
                    $bookings = Booking::where('mobile_number',$searchquery)->get();
                    if(!$bookings->isEmpty()){
                        echo $this->bookingViewRander($bookings);
                    }else{
                        echo 'No Search Data Found!!!';
                    }
                }

           }
        exit;
        }
    }

    static function bookingViewRander($bookings){
       //dd($bookings);
       $html = '';
//        $html .= ' <div class="panel panel-default card-view">
//        <div class="panel-heading">
//            <div class="pull-left">
//                <h2 class="shoots-Head">'.trans('sbph::app.search_result').'</h2>
//            </div>
//            <div class="clearfix"></div>
//        </div>
//        <div class="panel-wrapper">
//            <div class="panel-body">
//                <div class="table-wrap">
//                    <div class="table-responsive">
//                        <table id="datable_1" class="table table-hover display  pb-30" >
//                            <thead>
//                                <tr>
//                                    <th>'.  trans('sbph::app.bookingid').'</th>
//                                    <th>'.  trans('sbph::app.invoiceId').'</th>
//                                    <th>'. trans('sbph::app.package').'</th>
//                                    <th>'.  trans('sbph::app.booking_date').'</th>
//                                    <th>'.  trans('sbph::app.booking_time').'</th>
//                                    <th>'.  trans('sbph::app.booking_price').'</th>
//                                    <th>'.  trans('sbph::app.customer_name').'</th>
//                                    <th>'.  trans('sbph::app.mobile_number').'</th>
//                                    <th>'.  trans('sbph::app.baby_name').'</th>
//                                    <th>'.  trans('sbph::app.baby_age').'</th>
//                                    <th>'.  trans('sbph::app.instructions').'</th>
                                  
                                  
//                                </tr>
//                            </thead>
//                            <tfoot>
//                                <tr>
//                                <th>'.  trans('sbph::app.bookingid').'</th>
//                                <th>'.  trans('sbph::app.invoiceId').'</th>
//                                <th>'. trans('sbph::app.package').'</th>
//                                <th>'.  trans('sbph::app.booking_date').'</th>
//                                <th>'.  trans('sbph::app.booking_time').'</th>
//                                <th>'.  trans('sbph::app.booking_price').'</th>
//                                <th>'.  trans('sbph::app.customer_name').'</th>
//                                <th>'.  trans('sbph::app.mobile_number').'</th>
//                                <th>'.  trans('sbph::app.baby_name').'</th>
//                                <th>'.  trans('sbph::app.baby_age').'</th>
//                                <th>'.  trans('sbph::app.instructions').'</th>
                               
//                                </tr>
//                            </tfoot>
//                            <tbody>';
//                                foreach($bookings as $key=>$booking){ 
//                                     $html .= '<tr>';
//                                     $html .= '<td>'.$booking->title.'</td>';
//                                     $html .= '<td>'.$booking->transaction_id.'</td>';
//                                     $html .= '<td>'.$booking->package->title.'</td>';
//                                     $html .= '<td>'.$booking->booking_date.'</td>';
//                                     $html .= '<td>'.$booking->timeslot->title.' ['.$booking->timeslot->starttime.' to '.$booking->timeslot->endtime.'] </td>';
//                                     $html .= '<td>'.$booking->booking_price.' KD</td>';
//                                     $html .= '<td>'.$booking->customer_name.'</td>';
//                                     $html .= '<td>'.$booking->mobile_number.'</td>';
//                                     $html .= '<td>'.$booking->baby_name.'</td>';
//                                     $html .= '<td>'.$booking->instructions.'</td>';
//                                     $html .= '<td> </td>';
//                                     $html .= ' </tr>';
//                                }
//                             $html .= '</tbody>
//                        </table>
//                    </div>
//                </div>
//            </div>
//        </div>
//    </div>';
foreach($bookings as $key=>$booking){ 
            $html .=' <div class="row package-item">
               <div class="col-sm-12 mb-xl-4 pb-5">
                <div class="details-form">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-6 bg-light">
                                    <p class="fs20">
                                    '.  trans('sbph::app.bookingid').'
                                    </p>
                                </div>
                                <div class="col-sm-8 col-6">
                                    <p class="fs20">
                                    '.$booking->title.'
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-6 bg-light">
                                    <p class="fs20">
                                    '.  trans('sbph::app.invoiceId').'
                                        
                                    </p>
                                </div>
                                <div class="col-sm-8 col-6">
                                    <p class="fs20">
                                        '.$booking->transaction_id.'
                                    </p>
                                </div>
                            </div>
                         </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-6 bg-light">
                                    <p class="fs20">
                                    '.  trans('sbph::app.customer_name').'
                                    </p>
                                </div>
                                <div class="col-sm-8 col-6">
                                    <p class="fs20">
                                    '.$booking->customer_name.'
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-6 bg-light">
                                    <p class="fs20">'. trans('sbph::app.package').'</p>
                                </div>
                                <div class="col-sm-8 col-6">
                                    <p class="fs20">
                                    '.$booking->package->title.'
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-6 bg-light">
                                    <p class="fs20">
                                    '.  trans('sbph::app.mobile_number').'
                                    </p>
                                </div>
                                <div class="col-sm-8 col-6">
                                    <p class="fs20">
                                     '.$booking->mobile_number.'
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-6 bg-light">
                                    <p class="fs20">
                                    '.  trans('sbph::app.booking_date').'
                                    </p>
                                </div>
                                <div class="col-sm-8 col-6">
                                    <p class="fs20">
                                    '.$booking->booking_date.'
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-6 bg-light">
                                    <p class="fs20">
                                    '.  trans('sbph::app.baby_name').'
                                    </p>
                                </div>
                                <div class="col-sm-8 col-6">
                                    <p class="fs20">
                                    '.$booking->baby_name.'
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-6 bg-light">
                                    <p class="fs20">
                                    '.  trans('sbph::app.booking_time').'
                                    </p>
                                </div>
                                <div class="col-sm-8 col-6">
                                    <p class="fs20">
                                    '.$booking->timeslot->title.' ['.$booking->timeslot->starttime.' to '.$booking->timeslot->endtime.']
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-6 bg-light">
                                    <p class="fs20">
                                    '.  trans('sbph::app.baby_age').'
                                    </p>
                                </div>
                                <div class="col-sm-8 col-6">
                                    <p class="fs20">
                                    '.$booking->baby_age.'
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-sm-4 col-6 bg-light">
                                    <p class="fs20">
                                    '.  trans('sbph::app.status').'
                                        
                                    </p>
                                </div>
                                <div class="col-sm-8 col-6">
                                    <p class="fs20">
                                        '.$booking->status.'
                                    </p>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 pb-5">
                <div class="package-head bg-light radius15 mh53 py-1 px-3 mb-2 d-inline-flex align-items-center">
                    <h4 class="fs23">
                    '.  trans('sbph::app.instructions').'
                    </h4>
                </div>
                <p class="fs20">
                '.$booking->instructions.'
                </p>
            </div>
            </div>';
        }
   
       $html .= '';
        return $html ;
    }

}
