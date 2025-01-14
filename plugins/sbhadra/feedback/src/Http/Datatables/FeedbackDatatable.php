<?php

namespace Sbhadra\Feedback\Http\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Juzaweb\Http\Datatables\PostTypeDataTable;
use Sbhadra\Feedback\Models\Feedback;

class FeedbackDatatable extends PostTypeDataTable
{
    protected $tvSeries;

    public function mount($postType)
    {
        parent::mount($postType);
    }

    /**
     * Columns datatable
     *
     * @return array
     */
    public function columns()
    {
        return [
            'thumbnail' => [
                'label' => trans('sbsl::app.thumbnail'),
                'width' => '10%',
                'formatter' => function ($value, $row, $index) {
                    return '<img src="'.url($row->thumbnail)  .'" class="w-100" />';
                }
            ],
            'title' => [
                'label' => trans('sbsl::app.name'),
                'width' => '15%',
                'formatter' => function ($value, $row, $index) {
                    return $row->title;
                }
            ],
            'package' => [
                'label' => trans('sbph::app.package'),
                'width' => '10%',
                'formatter' => function ($value, $row, $index) {
                    return $row->package->title;
                }
            ],
            'content' => [
                'label' => trans('sbfe::content.message'),
                'formatter' => function ($value, $row, $index) {
                    return $row->content;
                }
            ],
            'status' => [
                'label' => trans('sbfe::content.status'),
                'formatter' => function ($value, $row, $index) {
                    return $row->status;
                }
            ],
            
            'created_at' => [
                'label' => trans('sbsl::app.created_at'),
                'width' => '10%',
                'align' => 'center',
                'formatter' => function ($value, $row, $index) {
                    return jw_date_format($row->created_at);
                }
            ],
            'actions' => [
                'label' => trans('sbsl::app.actions'),
                'width' => '10%',
                'sortable' => false,
                'formatter' => function ($value, $row, $index) {
                    if($row->status=='publish'){
                        return '<form action="'.route('admin.feedback.status').'" method="post" class="form-ajax">
                                                                        <input type="hidden" name="id" value="'.$row->id.'">
                                                                        <input type="hidden" name="status" value="draft">
                                                               '.csrf_field().'
                                                                        <button type="submit"   class="btn btn-danger"> <i class=" fa fa-trash"></i></button>
                                                                </form>';
                        
                    }else{
                        return '<form action="'.route('admin.feedback.status').'" method="post" class="form-ajax">
                                                                        <input type="hidden" name="id" value="'.$row->id.'">
                                                                        <input type="hidden" name="status" value="publish">
                                                               '.csrf_field().'
                                                                        <button type="submit"   class="btn btn-success"> <i class=" fa fa-check"></i></button>
                                                                </form>';
                        
                    }
                    
                }
            ]
        ];
    }

    /**
     * Query data datatable
     *
     * @param array $data
     * @return Builder
     */
    public function query($data)
    {
        $query = Feedback::query();
        if ($keyword = Arr::get($data, 'keyword')) {
            $query->where(function (Builder $q) use ($keyword) {
                $q->where('title', 'like', '%'. $keyword .'%');
                //$q->orWhere('description', 'like', '%'. $keyword .'%');
            });
        }

        return $query;
    }

    public function bulkActions($action, $ids)
    {
        switch ($action) {
            case 'delete':
                Feedback::destroy($ids);
                break;
        }
    }
}
