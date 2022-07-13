<?php

namespace Sbhadra\Advertisement\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Juzaweb\Traits\PostTypeController;
use Illuminate\Support\Facades\Validator;
use Sbhadra\Advertisement\Http\Datatables\AdvertisDatatable;
use Sbhadra\Advertisement\Models\Advertis;

class AdvertisementController extends BackendController
{
    use PostTypeController;

    protected $viewPrefix = 'sbsl::backend'; // View prefix for resource

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
        $dataTable = new SliderDatatable();
        $dataTable->mountData('sliders', 0);
        return $dataTable;
    }

    protected function getModel()
    {
        return Slider::class;
    }

    protected function getTitle()
    {
        return trans('sbsl::app.sliders');
    }
}
