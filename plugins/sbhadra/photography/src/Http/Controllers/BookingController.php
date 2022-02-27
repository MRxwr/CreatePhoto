<?php

namespace Sbhadra\Photography\Http\Controllers;

use Juzaweb\Traits\PostTypeController;
use Illuminate\Support\Facades\Validator;
use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Photography\Http\Datatables\BookingDatatable;
use Sbhadra\Photography\Models\Booking;
use Sbhadra\Photography\Models\Package;
use Illuminate\Http\Request;

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
    public function create(Request $request) {
        $id=($request->id?$request->id:null);
        $model = Package::firstOrNew(['id' => $id]);
        $packages= Package::all();  
        return view('sbph::backend.booking.create', [
            'model' => $model,
            'post' => $model,
            'packages' => $packages,
            'postType'=>'booking',
            'title' => $model->name ?: trans('sbph::app.add_new')
        ]);
    }
    public function getBookingCancel(Request $request,$id){
        $model = Booking::firstOrNew(['id' => $id]);
        $model->status ='cancel';
        $model->save();
        //dd($model);
        return redirect()->back()->with('success', 'This booking successfully cancled');  
    }
    public function getBookingCompleted(Request $request,$id){
        $model = Booking::firstOrNew(['id' => $id]);
        $model->status ='completed';
        $model->save();          
        return redirect()->back()->with('success', 'This booking successfully completed');  
    }
    public function getBookingRefund(Request $request,$id){
        $model = Booking::firstOrNew(['id' => $id]);
        $model->refunded =1;
        $model->save();         
        
        return redirect()->back()->with('success', 'This booking successfully refunded');  
    }
    public function getBookingSendSMS(Request $request,$id){
        $model = Booking::firstOrNew(['id' => $id]);
        $model->sms =1;
        $model->save();            
        return redirect()->back()->with('success', 'This booking successfully Sended'); 
    }
}

