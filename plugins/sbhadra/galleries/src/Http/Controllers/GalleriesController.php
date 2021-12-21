<?php

namespace Sbhadra\Galleries\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class GalleriesController extends BackendController
{
    public function index()
    {
        //

        return view('sbga::index', [
            'title' => 'Title Page',
        ]);
    }
}
