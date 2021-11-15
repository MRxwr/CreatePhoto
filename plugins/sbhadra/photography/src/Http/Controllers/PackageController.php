<?php

namespace Sbhadra\Photography\Http\Controllers;

use Juzaweb\Traits\PostTypeController;
use Illuminate\Support\Facades\Validator;
use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Photography\Http\Datatables\PackageDatatable;
use Sbhadra\Photography\Models\Package;

class PackageController extends BackendController
{
   
    use PostTypeController;

    protected $viewPrefix = 'sbph::backend.package'; // View prefix for resource

    // Make validator for store and update
    protected function validator(array $attributes)
    {
        $validator = Validator::make($attributes, [
            'title' => 'required|string|max:250',
        ]);

        return $validator;
    }

    // Make data json for index datatable
    protected function getDataTable()
    {
        $dataTable = new PackageDatatable();
        $dataTable->mountData('packages', 0);
        return $dataTable;
    }

    protected function getModel()
    {
        return Package::class;
    }

    protected function getTitle()
    {
        return trans('sbph::app.packages');
    }
}
