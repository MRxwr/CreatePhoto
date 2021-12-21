<?php

namespace Sbhadra\Instafeeds\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class InstafeedsController extends BackendController
{
    public function index()
    {
        //

        return view('sbin::index', [
            'title' => 'Title Page',
        ]);
    }
}
