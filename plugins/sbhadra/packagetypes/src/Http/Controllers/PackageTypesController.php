<?php

namespace Sbhadra\Packagetypes\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class PackageTypesController extends BackendController
{
    public function index()
    {
        //

        return view('sbpa::index', [
            'title' => 'Title Page',
        ]);
    }
}
