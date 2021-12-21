<?php

namespace Sbhadra\Payapi\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class PayapiController extends BackendController
{
    public function index()
    {
        //

        return view('sbpa::index', [
            'title' => 'Title Page',
        ]);
    }
}
