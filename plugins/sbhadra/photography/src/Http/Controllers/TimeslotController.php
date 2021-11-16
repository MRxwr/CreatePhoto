<?php

namespace Sbhadra\Photography\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class TimeslotController extends BackendController
{
    public function index()
    {
        //

        return view('sbph::index', [
            'title' => 'Title Page',
        ]);
    }
}
