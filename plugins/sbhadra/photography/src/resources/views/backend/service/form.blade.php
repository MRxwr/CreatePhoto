@extends('juzaweb::layouts.backend')

@section('content')

    @component('juzaweb::components.form_resource', [
        'model' => $model,
    ])
        <div class="row">
            <div class="col-md-8">

                {{ Field::text($model, 'title', [
                    'required' => true,
                    'class' => empty($model->slug) ? 'generate-slug' : '',
                ]) }}
                
                {{ Field::editor($model, 'content') }}

                @do_action('post_type.'. $postType .'.form.left')

            </div>

            <div class="col-md-4">
                {{ Field::select($model, 'status', [
                    'options' => $model->getStatuses()
                ]) }}

                {{ Field::text($model, 'price') }}
                <div class=" form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">Available date</label>
                        <input id="timepicker2" name="available_date" type="date" class="form-control input-small" value="{{$model->available_date}}">
                        <span class="input-group-addon"><i class="fa fa-watch"></i></span>
                </div> 
                {{ Field::image($model, 'thumbnail') }}
                @do_action('post_type.'. $postType .'.form.right', $model)
            </div>
        </div>
    @endcomponent

@endsection
