<?php

namespace Sbhadra\Calendar\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class CalendarController extends BackendController
{
    public function index()
    {
        //

        return view('sbca::index', [
            'title' => 'Title Page',
        ]);
    }
}
