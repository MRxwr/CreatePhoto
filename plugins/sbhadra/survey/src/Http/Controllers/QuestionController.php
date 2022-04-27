<?php

namespace Sbhadra\Survey\Http\Controllers;

use Juzaweb\Traits\PostTypeController;
use Illuminate\Support\Facades\Validator;
use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Survey\Http\Datatables\QuestionDatatable;
use Sbhadra\Survey\Models\Question;

class QuestionController extends BackendController
{
   
    use PostTypeController;

    protected $viewPrefix = 'sbsu::backend.question'; // View prefix for resource

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
        $dataTable = new QuestionDatatable();
        $dataTable->mountData('question', 0);
        return $dataTable;
    }

    protected function getModel()
    {
        return Question::class;
    }

    protected function getTitle()
    {
        return trans('sbsu::app.questions');
    }
}
