<?php

namespace Sbhadra\Employees\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;

class EmployeesController extends BackendController
{
    public function index()
    {
        //

        return view('sbem::index', [
            'title' => 'Title Page',
        ]);
    }
}
