<?php

namespace Sbhadra\Advertisement\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class AdvertisementController extends BackendController
{
    public function index()
    {
        //

        return view('sbad::index', [
            'title' => 'Title Page',
        ]);
    }
}
