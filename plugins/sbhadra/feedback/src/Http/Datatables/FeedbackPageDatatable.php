<?php

namespace Sbhadra\Feedback\Http\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Juzaweb\Http\Datatables\PostTypeDataTable;
use Sbhadra\Feedback\Models\Feedback;
use Sbhadra\Feedback\Models\FeedbackPage;

class FeedbackPageDatatable extends PostTypeDataTable
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
            'title' => [
                'label' => trans('sbsl::app.name'),
                'formatter' => function ($value, $row, $index) {
                    return $row->title;
                }
            ],
            'slug' => [
                'label' => trans('sbfe::content.feedback_url'),
                'formatter' => function ($value, $row, $index) {
                    return '<a href="'.url("feedback-form/").'?slug='. $row->slug.'" >'.url("feedback-form/").'?slug='. $row->slug.'</a>';
                }
            ],
            'created_at' => [
                'label' => trans('sbsl::app.created_at'),
                'width' => '15%',
                'align' => 'center',
                'formatter' => function ($value, $row, $index) {
                    return jw_date_format($row->created_at);
                }
            ],
            'actions' => [
                'label' => trans('sbsl::app.actions'),
                'width' => '15%',
                'sortable' => false,
                'formatter' => [$this, 'rowActionsFormatter']
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
        $query = FeedbackPage::query();
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
                FeedbackPage::destroy($ids);
                break;
        }
    }
}
