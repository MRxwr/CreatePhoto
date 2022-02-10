<?php

namespace Sbhadra\Kwtsms\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class KwtsmsController extends BackendController
{
    public function index()
    {
        //

        return view('sbkw::index', [
            'title' => 'Title Page',
        ]);
    }
}
