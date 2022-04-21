@extends('juzaweb::layouts.backend')

@section('content')

<!-- @dd(\Sbhadra\Photography\Models\Setting::where('field_value','api_key')->first()) -->
    <div class="row mb-3">
        <div class="col-md-8">
        <form action="{{route('admin.setting.post')}}" method="post" class="form-ajax" id="Be4MBcHP47k9METK" novalidate="novalidate">
        {!! csrf_field() !!}
            <div class="form-group row">
                    <label class="col-form-label" for="release">Pay Api Key</label>
                    <input id="timepicker1" name="api_key" type="text" class="form-control input-small" value="{{$settings[0]['field_value']}}">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>
                
                <div class="form-group row">
                    <label class="col-form-label" for="release">KWT SMS Username</label>
                    <input id="timepicker2" name="sms_username" type="text" class="form-control input-small" value="{{$settings[1]['field_value']}}">
                    <span class="input-group-addon"><i class="fa fa-watch"></i></span>
                </div>
                <div class="form-group row">
                    <label class="col-form-label" for="release">KWT SMS Password</label>
                    <input id="timepicker2" name="sms_password" type="text" class="form-control input-small" value="{{$settings[2]['field_value']}}">
                    <span class="input-group-addon"><i class="fa fa-watch"></i></span>
                </div>
                <div class="form-group row">
                    <label class="col-form-label" for="release">SMS Sender ID</label>
                    <input id="timepicker2" name="sms_sender" type="text" class="form-control input-small" value="{{$settings[3]['field_value']}}">
                    <span class="input-group-addon"><i class="fa fa-watch"></i></span>
                </div>
                <div class="mt-3"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save </button></div>
                </form>
            </div>
           
       

    </div>

   

@endsection