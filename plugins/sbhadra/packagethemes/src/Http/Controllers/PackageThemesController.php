<?php

namespace Sbhadra\Packagethemes\Http\Controllers;

use Juzaweb\Traits\PostTypeController;
use Illuminate\Support\Facades\Validator;
use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Packagethemes\Http\Datatables\ThemeDatatable;
use Sbhadra\Packagethemes\Models\Theme;

class PackageThemesController extends BackendController
{
   
    use PostTypeController;

    protected $viewPrefix = 'sbpa::backend.theme'; // View prefix for resource

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
        $dataTable = new ThemeDatatable();
        $dataTable->mountData('themes', 0);
        return $dataTable;
    }

    protected function getModel()
    {
        return Service::class;
    }

    protected function getTitle()
    {
        return trans('sbsu::app.questions');
    }
}
