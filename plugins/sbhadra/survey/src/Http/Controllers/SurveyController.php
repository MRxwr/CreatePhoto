<?php

namespace Sbhadra\Survey\Http\Controllers;

use Juzaweb\Traits\PostTypeController;
use Illuminate\Support\Facades\Validator;
use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Survey\Http\Datatables\SurveyDatatable;
use Sbhadra\Survey\Models\Survey;

class SurveyController extends BackendController
{
   
    use PostTypeController;

    protected $viewPrefix = 'sbsu::backend.survey'; // View prefix for resource

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
        $dataTable = new SurveyDatatable();
        $dataTable->mountData('surveys', 0);
        return $dataTable;
    }

    protected function getModel()
    {
        return Service::class;
    }

    protected function getTitle()
    {
        return trans('sbsu::app.survey');
    }
}
