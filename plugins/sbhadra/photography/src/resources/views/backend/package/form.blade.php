@extends('juzaweb::layouts.backend')

@section('content')
    @php
    $package_services = array();
    $package_slots = array();
        if($model->services){
            foreach($model->services as $service){
               $package_services[] = $service->id;
           } 
        }
        if($model->slots){
            foreach($model->slots as $slot){
               $package_slots[] = $slot->id;
           } 
        }  
   
    @endphp
    @component('juzaweb::components.form_resource', [
        'model' => $model,
    ])
        <div class="row">
            <div class="col-md-8">

                {{ Field::text($model, 'title', [
                    'required' => true,
                    'class' => empty($model->slug) ? 'generate-slug' : '',
                ]) }}
                {{ Field::slug($model, 'slug') }}
                {{ Field::editor($model, 'content') }}

                @do_action('post_type.'. $postType .'.form.left')

            </div>

            <div class="col-md-4">

                {{ Field::select($model, 'status', [
                    'options' => $model->getStatuses()
                ]) }}

                {{ Field::image($model, 'thumbnail') }}

                <div class="form-group">
                    <label class="col-form-label" for="release">@lang('sbph::app.price')</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ $model->price }}" autocomplete="off">
                </div>
              
                <div class="form-group">
                    <label class="col-form-label" for="services">@lang('sbph::app.services')</label>
                    <select name="services[]" id="services" class="form-control select2-default"  multiple="multiple">
                        @foreach($services ?? [] as $key => $service)
                        <option value="{{ $service->id }}" @if(in_array($service->id,$package_services)) {{'selected'}} @endif>{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="timeslots">@lang('sbph::app.timeslots')</label>
                    <select name="slots[]" id="timeslots" class="form-control select2-default"  multiple="multiple">
                        @foreach($timeslots ?? [] as $key => $slot)
                          <option value="{{ $slot->id }}" @if(in_array($slot->id,$package_slots)) {{'selected'}} @endif>{{ $slot->title }} [{{ $slot->starttime }} - {{ $slot->endtime }}] </option>
                        @endforeach
                    </select>
                </div>
                
                @do_action('post_type.'. $postType .'.form.right', $model)
            </div>
        </div>
    @endcomponent

@endsection
