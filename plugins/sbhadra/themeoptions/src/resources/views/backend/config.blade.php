@extends('juzaweb::layouts.backend')

@section('content')

<!-- @dd(\Sbhadra\Photography\Models\Setting::where('field_value','api_key')->first()) -->
<form action="{{route('admin.setting.post')}}" method="post" class="form-ajax" id="Be4MBcHP47k9METK" novalidate="novalidate">
        {!! csrf_field() !!}
    <div class="row mb-3">
        
        <div class="col-md-7">
        
               <div class="form-group row  m-3">
                    <label class="col-form-label" for="release">Pay Api Key</label>
                    <input id="timepicker1" name="api_key" type="text" class="form-control input-small" value="{{$settings['api_key']}}">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>

                <div class="form-group row  m-3">
                    <label class="col-form-label" for="release">Payment Type</label>
                    <label class="col-form-label" for="release">
                        <input  name="payment_type" type="radio"  value="1" @if(@$settings['payment_type']=='1') checked @endif> Fixed Price
                    </label>
                    <label class="col-form-label" for="release">
                        <input  name="payment_type" type="radio"  value="2" @if(@$settings['payment_type']=='2') checked @endif> Dynamic price
                    </label>
                    <input id="pay_amount" name="pay_amount" type="text" class="form-control input-small" value="{{@$settings['pay_amount']}}">
                </div>

                <div class="form-group row  m-3">
                    <label class="col-form-label" for="release">Send SMS before days</label>
                    <input id="number_day" name="number_day" type="text" class="form-control input-small" value="{{@$settings['number_day']}}">
                    <span class="input-group-addon"><i class="fa fa-watch"></i></span>
                </div>

                <div class="form-group row  m-3">
                    <label class="col-form-label" for="release">KWT SMS Username</label>
                    <input id="timepicker2" name="sms_username" type="text" class="form-control input-small" value="{{$settings['sms_username']}}">
                    <span class="input-group-addon"><i class="fa fa-watch"></i></span>
                </div>
                <div class="form-group row  m-3">
                    <label class="col-form-label" for="release">KWT SMS Password</label>
                    <input id="timepicker2" name="sms_password" type="text" class="form-control input-small" value="{{$settings['sms_password']}}">
                    <span class="input-group-addon"><i class="fa fa-watch"></i></span>
                </div>
                <div class="form-group row  m-3">
                    <label class="col-form-label" for="release">SMS Sender ID</label>
                    <input id="timepicker2" name="sms_sender" type="text" class="form-control input-small" value="{{$settings['sms_sender']}}">
                    <span class="input-group-addon"><i class="fa fa-watch"></i></span>
                </div>
                 <div class="form-group row  m-3">
                    <label class="col-form-label" for="release">
                        <input  name="id_auto_feedsms" type="hidden"   value="0">
                    <input  name="id_auto_feedsms" type="checkbox"  @if(@$settings['id_auto_feedsms']==1) checked="checked" @endif value="1"> Automated Feedback SMS</label>
                    <label class="col-form-label" for="release">After Number Of Day</label>
                    <input  name="afetr_number_days" type="number" class="input-small" value="{{@$settings['afetr_number_days']}}" min="1">
                    
                </div>
            </div>
            <div class="col-md-5" >
                  <div class="form-group row m-3">
                    <label class="col-form-label" for="release"> Delivery Address </label>
                    <label class="col-form-label" for="release">
                        <input  name="is_delivery" type="radio"  value="0" @if(@$settings['is_delivery']=='0') checked @endif> Disable
                    </label>
                    <label class="col-form-label" for="release">
                        <input  name="is_delivery" type="radio"  value="1" @if(@$settings['is_delivery']=='1') checked @endif> Enable
                    </label>
                    
                </div>   
            </div>
            <div class="col-md-12 ">
                <div class="mt-3"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save </button></div>
            </div>
          

    </div>

    </form>

@endsection