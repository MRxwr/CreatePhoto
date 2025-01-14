@extends('juzaweb::layouts.backend')
@section('head')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
@endsection

@section('content')
<style>
    .col-cu-2 {
        flex: 0 0 14.28%;
        max-width: 14.28%;
    }

</style>
        <div class="row">
        <form action="{{route('admin.calendar-setting')}}" method="POST">
        {!! csrf_field() !!}
        <input   type="hidden" name="id" value="" >
            <div class="col-md-10">
                <div class="row">
                <label class="col-form-label" for="release">@lang('sbca::app.calender_open_date')</label>
                    <div class="col-md-6 form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">@lang('sbca::app.start_date')</label>
                        <input id="timepicker1" name="start_date" type="date" class="form-control input-small" value="{{$setting->start_date}}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-date"></i></span>
                    </div>
                    <div class="col-md-6 form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">@lang('sbca::app.end_date')</label>
                        <input id="timepicker2" name="end_date" type="date" class="form-control input-small" value="{{$setting->end_date}}">
                        <span class="input-group-addon"><i class="fa fa-watch"></i></span>
                    </div> 
                    
                    <div class="col-md-12 form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">@lang('sbca::app.booking_slots')</label>
                        <input type="hidden" name="slot_mode" value="0">
                        <label class="checkbox-inline">
                            <input type="radio" name="slot_mode" value="0" @if($setting->slot_mode==0) checked @endif> @lang('sbca::app.package_wise')
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="slot_mode" value="1"  @if($setting->slot_mode==1) checked @endif> @lang('sbca::app.open_day_wise')
                        </label>
                       
                    </div>
                    <div class="col-md-6 form-group  ">
                        <label class="col-form-label" for="release">Number of Booking/Slog</label>
                        <input id="colorpicker" name="booking_per_slot" type="number" class="form-control input-small" value="{{$setting->booking_per_slot}}" min="0">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-date"></i></span>
                    </div>
                    <div class="col-md-4 form-group bootstrap-timepicker ">
                        <label class="col-form-label" for="release">Close current day with</label>
                        <input id="cwith_days" name="cwith_days" type="number" class="form-control input-small" min="0" max="6" value="{{$setting->cwith_days}}">
                        <span class="input-group-addon">Days</span>
                    </div>
                    @php 
                     $close_days =json_decode($setting->close_days) ;
                     //var_dump($close_days);
                    
                     $act1slots=[];
                     if(array_key_exists(1, $active_slots) && !empty($active_slots[1])){
                         $act1slots = array_values($active_slots[1]);
                      }
                    
                     
                     $act2slots=[];
                     if(array_key_exists(2, $active_slots) && !empty($active_slots[2])){
                         $act2slots = array_values($active_slots[2]);
                     }
                     
                     $act3slots=[];
                     if(array_key_exists(3, $active_slots) && !empty($active_slots[3])){
                         $act3slots = array_values($active_slots[3]);
                     }
                     
                     $act4slots=[];
                     if(array_key_exists(4, $active_slots) && !empty($active_slots[4])){
                        $act4slots = array_values($active_slots[4]);
                     }
                     
                     $act5slots=[];
                     if(array_key_exists(5, $active_slots) && !empty($active_slots[5])){
                        $act5slots = array_values($active_slots[5]);
                     }
                     
                     $act6slots=[];
                     if(array_key_exists(6, $active_slots) && !empty($active_slots[6])){
                        $act6slots = array_values($active_slots[6]);
                       }
                     
                     $act0slots=[];
                     if(array_key_exists(0, $active_slots) && !empty($active_slots[0])){
                         $act0slots = array_values($active_slots[0]);
                     }
                     
                    @endphp
                    
                    <div class="col-md-12 form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">@lang('sbca::app.close_days')</label>
                        <input type="hidden" name="close_days[]" value="9">
                        <div class="row">
                            <div class="col-md-2 col-cu-2">
                                 <label class="checkbox-inline">
                                    <input id="closeday1n" type="checkbox" class="closeday" name="close_days[]" value="1" @if(in_array(1,$close_days)) checked @endif> @lang('sbca::app.monday')
                                 </label>  
                                     
                                   @foreach($slots as $slot)
                                  
                                    <label class="checkbox">
                                        <input type="checkbox" class="closeday1n" name="slots[1][]" value="{{ $slot->id }}"  @if(in_array($slot->id,$act1slots)) checked @endif > 
                                        {{$slot->starttime }} to {{$slot->endtime }}
                                    </label> 
                                    @endforeach
                                
                            </div>
                            <div class="col-md-2 col-cu-2">
                                 <label class="checkbox-inline">
                                    <input id="closeday2n" type="checkbox" class="closeday" name="close_days[]" value="2"  @if(in_array(2,$close_days)) checked @endif> @lang('sbca::app.tuesday')
                                </label> 
                                   
                                   @foreach($slots as $slot)
                                     
                                     <label class="checkbox">
                                        <input type="checkbox" class="closeday2n" name="slots[2][]" value="{{ $slot->id }}"  @if(in_array($slot->id,$act2slots)) checked @endif > 
                                        {{$slot->starttime }} to {{$slot->endtime }}
                                    </label> 
                                    @endforeach
                            </div>
                            <div class="col-md-2 col-cu-2">
                                <label class="checkbox-inline">
                                    <input id="closeday3n" type="checkbox" class="closeday" name="close_days[]" value="3"  @if(in_array(3,$close_days)) checked @endif> @lang('sbca::app.wednesday')
                                </label>
                                   
                                   @foreach($slots as $slot)
                                      
                                    <label class="checkbox">
                                        <input type="checkbox" class="closeday3n" name="slots[3][]" value="{{ $slot->id }}"  @if(in_array($slot->id,$act3slots)) checked @endif > 
                                        {{$slot->starttime }} to {{$slot->endtime }}
                                    </label> 
                                    @endforeach
                            </div>
                            <div class="col-md-2 col-cu-2">
                                <label class="checkbox-inline">
                                        <input id="closeday4n" type="checkbox" class="closeday" name="close_days[]" value="4"  @if(in_array(4,$close_days)) checked @endif> @lang('sbca::app.thursday')
                                    </label>
                                       
                                   @foreach($slots as $slot)
                                      
                                    <label class="checkbox">
                                        <input type="checkbox" class="closeday4n" name="slots[4][]" value="{{ $slot->id }}"  @if(in_array($slot->id,$act4slots)) checked @endif > 
                                        {{$slot->starttime }} to {{$slot->endtime }}
                                    </label> 
                                    @endforeach
                            </div>
                            <div class="col-md-2 col-cu-2">
                                <label class="checkbox-inline">
                                    <input id="closeday5n" type="checkbox" class="closeday" name="close_days[]" value="5"  @if(in_array(5,$close_days)) checked @endif> @lang('sbca::app.friday')
                                </label>
                                   
                                   @foreach($slots as $slot)
                                        
                                    <label class="checkbox">
                                        <input type="checkbox" class="closeday5n" name="slots[5][]" value="{{ $slot->id }}"  @if(in_array($slot->id,$act5slots)) checked @endif > 
                                        {{$slot->starttime }} to {{$slot->endtime }}
                                    </label> 
                                    @endforeach
                            </div>
                            <div class="col-md-2 col-cu-2">
                                <label class="checkbox-inline">
                                    <input id="closeday6n" type="checkbox" class="closeday" name="close_days[]" value="6"  @if(in_array(6,$close_days)) checked @endif> @lang('sbca::app.saturday')
                                </label>
                                   
                                   @foreach($slots as $slot)
                                     
                                    <label class="checkbox">
                                        <input type="checkbox" class="closeday6n" name="slots[6][]" value="{{ $slot->id }}"  @if(in_array($slot->id,$act6slots)) checked @endif   > 
                                        {{$slot->starttime }} to {{$slot->endtime }}
                                    </label> 
                                    @endforeach
                            </div>
                            <div class="col-md-2 col-cu-2">
                                <label class="checkbox-inline">
                                    <input id="closeday0n" type="checkbox" class="closeday" name="close_days[]" value="0"  @if(in_array(0,$close_days)) checked @endif> @lang('sbca::app.sunday')
                                </label>
                                   
                                   @foreach($slots as $slot)
                                    <label class="checkbox">
                                        <input type="checkbox" class="closeday0n" name="slots[0][]" value="{{ $slot->id }}"  @if(in_array($slot->id,$act0slots)) checked @endif > 
                                        {{$slot->starttime }} to {{$slot->endtime }}
                                    </label> 
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="col-md-6 form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">Default Date Color</label>
                        <input id="colorpicker" name="default_color" type="color" class="form-control input-small" value="{{$setting->default_color}}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-date"></i></span>
                    </div>
                    <div class="col-md-6 form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">Select Date Color</label>
                        <input id="colorpicker" name="select_color" type="color" class="form-control input-small" value="{{$setting->select_color}}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-date"></i></span>
                    </div>
                    <div class="col-md-6 form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">close date Color</label>
                        <input id="colorpicker" name="offday_color" type="color" class="form-control input-small" value="{{$setting->offday_color}}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-date"></i></span>
                    </div>
                    <div class="col-md-6 form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">Full Book date Color</label>
                        <input id="colorpicker" name="fullbook_color" type="color" class="form-control input-small" value="{{$setting->fullbook_color}}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-date"></i></span>
                    </div>
                    
                    <div class="col-md-12"><div class="btn-group float-right"><button type="submit" class="btn btn-success px-5"><i class="fa fa-save"></i> Save</button> <button type="button" class="btn btn-warning cancel-button px-3"><i class="fa fa-refresh"></i> Reset</button></div></div>
                </div>  
            </div>
            </form>
        </div>
   

@endsection
@section('footer')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
    //$('#timepicker1').timepicker();
    //$('#timepicker2').timepicker();
    $('.closeday').on('change', function() {
    // Get the ID of the checked element
    let checkedId = $(this).attr('id');
    
    // Uncheck all other checkboxes with the same class
    // Log the checked ID
    if ($(this).is(':checked')) {
        $('.'+checkedId).not(this).prop('checked', false);
    } else {
        $('.'+checkedId).not(this).prop('checked', true);
    }
});
</script>
@endsection
