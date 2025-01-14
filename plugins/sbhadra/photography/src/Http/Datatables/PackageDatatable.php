<?php

namespace Sbhadra\Photography\Http\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Juzaweb\Http\Datatables\PostTypeDataTable;
use Sbhadra\Photography\Models\Package;

class PackageDatatable extends PostTypeDataTable
{
    
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
            'odrs' => [
                'label' => 'order',
                'width' => '2%',
                'formatter' => function ($value, $row, $index) {
                    return '<input data-index="'.$row->id.'" style="width: 50px;" type="number" name="odrs" value="'.$row->odrs.'" />';
                }
            ],
            'thumbnail' => [
                'label' => trans('sbph::app.thumbnail'),
                'width' => '7%',
                'formatter' => function ($value, $row, $index) {
                    return '<img src="'. $row->getThumbnail() .'" class="w-100" />';
                }
            ],
            'title' => [
                'label' => trans('sbph::app.name'),
                'formatter' => [$this, 'rowActionsFormatter']
            ],
            'price' => [
                'label' => trans('sbph::app.price'),
                'formatter' => function ($value, $row, $index) {
                    return $row->price;
                }
            ],
            'created_at' => [
                'label' => trans('sbph::app.created_at'),
                'width' => '15%',
                'align' => 'center',
                'formatter' => function ($value, $row, $index) {
                    return jw_date_format($row->created_at);
                }
            ],
            'actions' => [
                'label' => trans('sbph::app.actions'),
                'width' => '15%',
                'sortable' => false
                
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
        $query = Package::query();
        if ($keyword = Arr::get($data, 'keyword')) {
            $query->where(function (Builder $q) use ($keyword) {
                $q->where('title', 'like', '%'. $keyword .'%');
                $q->orWhere('description', 'like', '%'. $keyword .'%');
            });
        }
        $query->orderBy('odrs', 'asc');
        return $query;
    }

    public function bulkActions($action, $ids)
    {
        switch ($action) {
            case 'delete':
                Package::destroy($ids);
                break;
        }
    }
}
