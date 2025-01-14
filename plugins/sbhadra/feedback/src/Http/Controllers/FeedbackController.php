<?php

namespace Sbhadra\Feedback\Http\Controllers;

use Juzaweb\Http\Controllers\BackendController;
use Juzaweb\Traits\PostTypeController;
use Illuminate\Support\Facades\Validator;
use Sbhadra\Feedback\Http\Datatables\FeedbackDatatable;
use Sbhadra\Feedback\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends BackendController
{
    
    
    use PostTypeController;

    protected $viewPrefix = 'sbfe::backend.feedback'; // View prefix for resource

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
        $dataTable = new FeedbackDatatable();
        $dataTable->mountData('feedbacks', 0);
        return $dataTable;
    }

    protected function getModel()
    {
        return Feedback::class;
    }

    protected function getTitle()
    {
        return trans('sbfe::content.feedbacks');
    }
    
    public function ChangeStatus(Request $request){
        
      $feedback =  Feedback::find($request->id);
      $feedback->status = $request->status;
      if($feedback->save()){
          return $this->success([
            'message' => 'Feedback status successfully changed',
            'redirect' => route('feedbacks.index'),
        ]);

      }else{
          return $this->error([
            'message' => 'Error occurs on change status',
            'redirect' => route('feedbacks.index'),
        ]);

      }
    }
}
