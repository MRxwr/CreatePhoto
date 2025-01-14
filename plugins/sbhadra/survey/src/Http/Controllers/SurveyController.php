<?php

namespace Sbhadra\Survey\Http\Controllers;

use Juzaweb\Traits\PostTypeController;
use Illuminate\Support\Facades\Validator;
use Juzaweb\Http\Controllers\BackendController;
use Sbhadra\Survey\Http\Datatables\SurveyDatatable;
use Sbhadra\Survey\Models\Survey;
use Sbhadra\Survey\Models\Question;
use Illuminate\Http\Request;

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
        $dataTable->mountData('survey', 0);
        return $dataTable;
    }

    protected function getModel()
    {
        return Survey::class;
    }

    protected function getTitle()
    {
        return trans('sbsu::app.survey');
    }
    public function getDetails($id){
        $model = Survey::firstOrNew(['id' => $id]);
        return view('sbsu::backend.survey.show', [
            'model' => $model,
            'title' => trans('sbsu::app.survey')
        ]);;
    }
   public function getReports(Request $request){
        $from = date('Y-m-d');
        $to = date('Y-m-d');
        if ($request->input('submit')) {
            // Validate that 'from' and 'to' dates are provided
            $request->validate([
                'from' => 'required|date',
                'to' => 'required|date|after_or_equal:from'
            ]);
        
            $from = $request->input('from');
            $to = $request->input('to');
            
            // Fetch surveys between 'from' and 'to' dates
            $models = Survey::whereDate('created_at', '>=', $request->input('from'))
                            ->whereDate('created_at', '<=', $request->input('to'))
                            ->get();
        } else {
            $models = Survey::get();
        }
        //$questions =  Question::where('id',$id)->get();
        $questions =  Question::get();
        return view('sbsu::backend.survey.report', [
            'models' => $models,
            'from' =>$from,
            'to' =>$to,
            'questions'=>$questions,
            'title' => 'Survey reports'
        ]);
    }
}
