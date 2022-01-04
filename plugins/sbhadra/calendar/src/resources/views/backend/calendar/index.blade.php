@extends('juzaweb::layouts.backend')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" integrity="sha512-liDnOrsa/NzR+4VyWQ3fBzsDBzal338A1VfUpQvAcdt+eL88ePCOd3n9VQpdA0Yxi4yglmLy/AmH+Lrzmn0eMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="row mb-3">
        <div class="col-md-8">
           <div id='calendar'></div>
        </div>
        <div class="col-md-4">
        <form action="{{route('admin.calendar-date')}}" method="POST">
        {!! csrf_field() !!}
        <div class="row">
            <div class="form-group">  
            </div>
                <div class="col-md-12 form-group bootstrap-timepicker timepicker">
                            <label class="col-form-label" for="release">@lang('sbph::app.starttime')</label>
                            <select name="package_id" class="form-control input-small select2" id="package_id">
                                @foreach($packages as $key=>$package)
                                <option value="{{$package->id}}">{{$package->title}}</option>
                                @endforeach
                        </select>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>
                <div class="col-md-6 form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">@lang('sbca::app.start_date')</label>
                        <input id="start_date" name="start_date" type="date" class="form-control input-small" value="">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-date"></i></span>
                </div>
                <div class="col-md-6 form-group bootstrap-timepicker timepicker">
                        <label class="col-form-label" for="release">@lang('sbca::app.end_date')</label>
                        <input id="end_date" name="end_date" type="date" class="form-control input-small" value="">
                        <span class="input-group-addon"><i class="fa fa-watch"></i></span>
                </div> 
                <div class="col-md-12"><div class="btn-group float-right"><button type="submit" class="btn btn-success px-5"><i class="fa fa-save"></i> Save</button> <button type="button" class="btn btn-warning cancel-button px-3"><i class="fa fa-refresh"></i> Reset</button></div></div> 
             
        </div> 
        </form>  
         
     </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
   
   $(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
     editable:true,
     header:{
      left:'prev,next today',
      center:'title',
      right:'month,agendaWeek,agendaDay'
     },
     events: '{{route("admin.booking-json")}}',
     selectable:true,
     selectHelper:true,
     select: function(start, end, allDay)
     {
       var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
       $('#start_date').val(start)
       var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
       $('#end_date').val(end)

      //var title = prompt("Enter Event Title");
    //   if(title)
    //   {
    //    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
    //    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
    //    $.ajax({
    //     url:"insert.php",
    //     type:"POST",
    //     data:{title:title, start:start, end:end},
    //     success:function()
    //     {
    //      calendar.fullCalendar('refetchEvents');
    //      alert("Added Successfully");
    //     }
    //    })
    //   }
     },
     editable:true,
     eventResize:function(event)
     {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      var title = event.title;
      var id = event.id;
      $.ajax({
       url:"update.php",
       type:"POST",
       data:{title:title, start:start, end:end, id:id},
       success:function(){
        calendar.fullCalendar('refetchEvents');
        alert('Event Update');
       }
      })
     },
 
     eventDrop:function(event)
     {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      var title = event.title;
      var id = event.id;
      $.ajax({
       url:"update.php",
       type:"POST",
       data:{title:title, start:start, end:end, id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Updated");
       }
      });
     },
 
     eventClick:function(event)
     {
      if(confirm("Are you sure you want to remove it?"))
      {
       var id = event.id;
       $.ajax({
        url:"delete.php",
        type:"POST",
        data:{id:id},
        success:function()
        {
         calendar.fullCalendar('refetchEvents');
         alert("Event Removed");
        }
       })
      }
     },
 
    });
   });
    
   </script>
@endsection