<?php

namespace Sbhadra\Feedback\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Juzaweb\Traits\PostTypeController;
use Illuminate\Support\Facades\Validator;
use Sbhadra\Feedback\Http\Datatables\FeedbackPageDatatable;
use Sbhadra\Feedback\Models\Feedback;
use Sbhadra\Feedback\Models\FeedbackPage;

class FeedbackPageController extends BackendController
{
    
    
    use PostTypeController;

    protected $viewPrefix = 'sbfe::backend.feedback-page'; // View prefix for resource

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
        $dataTable = new FeedbackPageDatatable();
        $dataTable->mountData('feedback-pages', 0);
        return $dataTable;
    }

    protected function getModel()
    {
        return FeedbackPage::class;
    }

    protected function getTitle()
    {
        return trans('sbfe::content.feedback_page');
    }
}
