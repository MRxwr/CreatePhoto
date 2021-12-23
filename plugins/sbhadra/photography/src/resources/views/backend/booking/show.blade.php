@extends('juzaweb::layouts.backend')

@section('content')

        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.bookingid')</div>
            <div class="col-md-9">{{$model->title}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.invoiceId')</div>
            <div class="col-md-9">{{$model->transaction_id}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.package')</div>
            <div class="col-md-9">{{$model->package->title}} </div>
        </div>
        @if($model->services)
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.services')</div>
            <div class="col-md-9">
                @foreach($model->services as $service)
                <span  class="btn btn-info btn-sm"> {{$service->title}} </span>
                @endforeach
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.booking_price')</div>
            <div class="col-md-9">{{$model->booking_price}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.customer_name')</div>
            <div class="col-md-9">{{$model->customer_name}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.mobile_number')</div>
            <div class="col-md-9">{{$model->mobile_number}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.booking_date')</div>
            <div class="col-md-9">{{$model->booking_date}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.booking_time')</div>
            <div class="col-md-9">{{$model->timeslot->title}} [{{$model->timeslot->starttime}} to {{$model->timeslot->endtime}}] </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.baby_name')</div>
            <div class="col-md-9">{{$model->baby_name}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.baby_age')</div>
            <div class="col-md-9">{{$model->baby_age}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.instructions')</div>
            <div class="col-md-9">{{$model->instructions}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.refunded')</div>
            <div class="col-md-9">{{$model->refunded}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.status')</div>
            <div class="col-md-9">{{$model->status}} </div>
        </div>
        <div class="row">
            <div class="col-md-3"> @lang('sbph::app.created_at')</div>
            <div class="col-md-9">{{$model->created_at}} </div>
        </div>
        
@endsection
