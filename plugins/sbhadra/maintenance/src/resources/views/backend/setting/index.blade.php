@extends('juzaweb::layouts.backend')

@section('content')

<!-- @dd(\Sbhadra\Photography\Models\Setting::where('field_value','api_key')->first()) -->
    <div class="row mb-3">
        <div class="col-md-8">
        <form action="{{route('admin.setting.post')}}" method="post" class="form-ajax" id="Be4MBcHP47k9METK" novalidate="novalidate">
        {!! csrf_field() !!}
               <div class="form-group row">
                    <label class="col-form-label" for="release">Maintenance</label>
                    <input  name="is_maintenance" type="hidden"  value="0">
                    <input  name="is_maintenance" type="checkbox"  value="1" @if($settings['is_maintenance']==1) checked @endif>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>
                <div class="form-group row">
                    <label class="col-form-label" for="release"> Title text</label>
                    <textarea name="page_title_text" type="text" class="form-control input-small">{{@$settings['page_title_text']}}</textarea>
                </div>
                <div class="form-group row">
                    <label class="col-form-label" for="release">Body</label>
                    <textarea name="body_text" type="text" class="form-control input-small">{{@$settings['body_text']}}</textarea>
                    
                </div>
                <div class="form-group row">
                    <label class="col-form-label" for="release">Header Text</label>
                    <textarea name="header_text" type="text" class="form-control input-small">{{@$settings['header_text']}}</textarea>
                </div>
                <div class="form-group row">
                    <label class="col-form-label" for="release">Footer Text</label>
                    <textarea name="footer_text" type="text" class="form-control input-small">{{@$settings['footer_text']}}</textarea>
                </div>
                <div class="mt-3"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save </button></div>
                </form>
            </div>
           
       

    </div>

   

@endsection