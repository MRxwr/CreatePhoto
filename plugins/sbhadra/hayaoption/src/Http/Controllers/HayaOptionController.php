<?php

namespace Sbhadra\Demahoption\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class DemahOptionController extends BackendController
{
    public function index()
    {
        //

        return view('sbha::index', [
            'title' => 'Title Page',
        ]);
    }
}
