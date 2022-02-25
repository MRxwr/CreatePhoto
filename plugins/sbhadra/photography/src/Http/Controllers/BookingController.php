<?php

namespace Sbhadra\Photography\Http\Controllers;

use Juzaweb\Traits\PostTypeController;
use Illuminate\Support\Facades\Validator;
use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Photography\Http\Datatables\BookingDatatable;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Package;

class BookingController extends BackendController
{
   
    use PostTypeController;

    protected $viewPrefix = 'sbph::backend.booking'; // View prefix for resource

    // Make validator for store and update
    protected function validator(array $attributes)
    {
        $validator = Validator::make($attributes, [
            'title' => 'required|string|max:250',
        ]);

        return $validator;
    }

    

    // Make data json for index datatable
    protected function getDataTable()
    {
        $dataTable = new BookingDatatable();
        $dataTable->mountData('bookings', 0);
        return $dataTable;
    }


    protected function getModel()
    {
        return Booking::class;
    }

    protected function getTitle()
    {
        return trans('sbph::app.bookings');
    }

    public function getBookingDetails($id){
        $model = Booking::firstOrNew(['id' => $id]);
        return view('sbph::backend.booking.show', [
            'model' => $model,
            'postType'=>'booking',
            'title' => $model->name ?: trans('sbph::app.booking')
        ]);;
    }
    public function addNewBooking($id =0){
        if($id ==0){
            $mode= array();
        }else{
            $model = Package::firstOrNew(['id' => $id]);
        }
  
    }
    public function getBookingCancel($id){
        $model = Booking::firstOrNew(['id' => $id]);
        
    }
    public function getBookingRefund($id){
        $model = Booking::firstOrNew(['id' => $id]);
        
    }
    public function getBookingSendSMS($id){
        $model = Booking::firstOrNew(['id' => $id]);
        
    }
}

