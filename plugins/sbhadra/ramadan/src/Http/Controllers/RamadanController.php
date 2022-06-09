<?php

namespace Sbhadra\Ramadan\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class RamadanController extends BackendController
{
    public function index()
    {
        //

        return view('sbra::index', [
            'title' => 'Title Page',
        ]);
    }
}
