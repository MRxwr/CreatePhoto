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

                @do_action('post_type.'. $postType .'.form.right', $model)
            </div>
        </div>
    @endcomponent

@endsection
