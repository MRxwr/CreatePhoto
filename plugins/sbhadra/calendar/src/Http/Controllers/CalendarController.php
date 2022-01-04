<?php

namespace Sbhadra\Calendar\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Calendar\Models\Calendar;
use Sbhadra\Calendar\Models\CalendarSetting;
use Sbhadra\Photography\Models\Package;
use Illuminate\Http\Request;

class CalendarController extends BackendController
{
    public function index()
    {
        $packages = Package::get();
        $dates = Calendar::get();
        return view('sbca::backend.calendar.index', [
            'title' => 'Booking Calendar',
            'packages'=>$packages,
            'dates'=>$dates,
        ]);
    }
    public function setting()
    {
        $setting = CalendarSetting::find(1);   
        return view('sbca::backend.calendar.setting', [
            'title' => 'Booking Calendar',
            'setting'=>$setting
        ]);
    }
    public function dateSave(Request $request)
    {
       // dd($request->all());
        $date = new Calendar;
        $date ->from_date = $request->start_date;
        $date ->to_date = $request->end_date;
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
        $setting ->save();
        return $this->success([
            'message' => trans('sbca::app.saved_successfully'),
            'redirect' => route('admin.calendar-setting'),
        ]);
    }
}
