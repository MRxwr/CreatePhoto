<?php

namespace Sbhadra\Photography\Http\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Juzaweb\Http\Datatables\PostTypeDataTable;
use Sbhadra\Photography\Models\Booking;

class BookingDatatable extends PostTypeDataTable
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
                'label' => trans('sbph::app.bookingid'),
                'formatter' => function ($value, $row, $index) {
                    return $row->title;
                }
            ],
            'package' => [
                'label' => trans('sbph::app.package'),
                'formatter' => function ($value, $row, $index) {
                    return $row->package->title;
                }
            ],
            'customer_name' => [
                'label' => trans('sbph::app.customer_name'),
                'formatter' => function ($value, $row, $index) {
                    return $row->customer_name;
                }
            ],
            'mobile_number' => [
                'label' => trans('sbph::app.mobile_number'),
                'formatter' => function ($value, $row, $index) {
                    return $row->mobile_number;
                }
            ],
            'booking_date' => [
                'label' => trans('sbph::app.booking_date'),
                'formatter' => function ($value, $row, $index) {
                    return $row->booking_date;
                }
            ],
            'status' => [
                'label' => trans('sbph::app.status'),
                'formatter' => function ($value, $row, $index) {
                    return $row->status;
                }
            ],
            'created_at' => [
                'label' => trans('sbsl::app.created_at'),
                'width' => '14%',
                'align' => 'center',
                'formatter' => function ($value, $row, $index) {
                    return jw_date_format($row->created_at);
                }
            ],
            'actions' => [
                'label' => trans('sbph::app.actions'),
                'width' => '5%',
                'sortable' => false,
                'formatter' => function ($value, $row, $index) {
                    $view_details = route('admin.bookings.view', [$row->id]);
                    $booking_cancel = route('admin.bookings.cancel', [$row->id]);
                    $booking_refund = route('admin.bookings.refund', [$row->id]);
                    $booking_sendsms = route('admin.bookings.sendsms', [$row->id]);
                    $booking_complete = route('admin.bookings.complete', [$row->id]);
                    
                    return '<div class="dropdown d-inline-block mb-2 mr-2">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        Options
                        </button>
                            <div class="dropdown-menu" role="menu" style="">
                            <a href="'.$view_details.'" class="dropdown-item"> <i class=" fa fa-eye"></i> View</a>
                            <a href="'.$view_details.'" class="dropdown-item"> <i class=" fa fa-edit"></i> Edit</a>
                            <a href="'.$booking_cancel.'" class="dropdown-item"> <i class=" fa fa-times"></i> Cancel</a>
                            <a href="'.$booking_refund.'" class="dropdown-item"> <i class=" fa fa-undo"></i> Refund</a>
                            <a href="'.$booking_sendsms.'" class="dropdown-item"> <i class=" fa fa-mobile"></i> Send Sms</a>
                            <a href="'.$booking_complete.'" class="dropdown-item"> <i class=" fa fa-mobile"></i> Completed</a>
                            </div>
                        </div>
                    </div>';
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
        $query = Booking::query();
        if ($keyword = Arr::get($data, 'keyword')) {
            $query->where(function (Builder $q) use ($keyword) {
                $q->where('title', 'like', '%'. $keyword .'%');
                $q->orWhere('description', 'like', '%'. $keyword .'%');
            });
        }

        return $query;
    }

    public function bulkActions($action, $ids)
    {
        switch ($action) {
            case 'delete':
                Booking::destroy($ids);
                break;
        }
    }
}
