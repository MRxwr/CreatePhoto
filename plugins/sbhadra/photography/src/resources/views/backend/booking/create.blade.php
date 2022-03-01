@extends('juzaweb::layouts.backend')

@section('content')
<script>
      var startDate='2022-01-01';
      var endDate='2046-12-31';
      var datesDisabled = ["13-01-2022"];
      var daysOfWeekDisabled = [5,6]
    </script>
    @php
       $id =(!empty($_REQUEST)?$_REQUEST['id']:0 );
        
    @endphp
    <div class="form">
         <form action="{{url()->current()}}" method="get">
          <div class="row">
            <div class="col-md-7">
              <div class="form-group row">
                    <label for="" class="col-sm-5 col-md-4 col-form-label">Select Package:</label>
                            <div class="col-sm-7 col-md-8">
                                <select class="form-control form-control-lg" name="id" onchange="packageRedirect(this.value);">
                                    @foreach($packages as $package)
                                    <option value="{{$package->id}}" @if($id==$package->id) selected="selected" @endif> {{$package->title}}</option>
                                    @endforeach
                                </select> 
                            </div>
                    </div>
            </div>
            <div class="col-md-7">
            <div class="form-group"> <!-- Date input -->
                <input type="hidden" name="package_id" id="package_id" value="{{ $post->id }}">
                <input class="form-control" id="date" name="date" value="@if(isset($_REQUEST['date'])) {{$_REQUEST['date']}} @endif " placeholder="MM/DD/YYY" type="text"/>
                <div id="bookingdate"></div>
              </div>
              <div class="btn-group float-right"><button type="submit" class="btn btn-success px-5"><i class="fa fa-save"></i> Next</button> </div>
            </div>
            </div>
        </form>
    </div>

   

    <div @if(isset($_REQUEST['date']) && ($_REQUEST['date']!='') ) style="display:block" @else style="display:none" @endif>

    @component('juzaweb::components.form_resource', [
        'model' => $model,
    ])
    <div class="row">
            <div class="col-md-8">
                <div class="row">
                <input type="hidden" name="title" id="title" value="CPBK{{time()}}">
                <input type="hidden" name="slug" id="slug" value="CPBK{{time()}}">
                    <div class="col-12">
                    <h2 class="shoots-Head2">Personal Information</h2>
                    </div>
                    <div class="col-md-8 col-sm-10">
                    
                        @do_action('admin.reservation.data')
                        
                        @do_action('admin.reservation.time')
                    
                        @do_action('admin.reservation.services')

                        <div class="form-group row">
                        <label for="" class="col-sm-5 col-md-4 col-form-label">Customer Name:</label>
                        <div class="col-sm-7 col-md-8">
                            <input type="text" class="form-control form-control-lg" id="customer_name" name="customer_name" required >
                        </div>
                        </div>

                        <div class="form-group row" style="display:none">
                        <label for="" class="col-sm-5 col-md-4 col-form-label">Customer Email:</label>
                        <div class="col-sm-7 col-md-8">
                            <input type="email" class="form-control form-control-lg" id="customer_email" name="customer_email" value="Hello@myshootskw.com" required>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="" class="col-sm-5 col-md-4 col-form-label">Mobile Number:</label>
                        <div class="col-sm-7 col-md-8">
                            <input type="text" class="form-control form-control-lg" id="mobile_number" name="mobile_number" required>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="" class="col-sm-5 col-md-4 col-form-label">Baby Name:</label>
                        <div class="col-sm-7 col-md-8">
                            <input type="text" class="form-control form-control-lg" id="baby_name" name="baby_name">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="" class="col-sm-5 col-md-4 col-form-label">Baby Age:</label>
                        <div class="col-sm-7 col-md-8">
                            <input type="text" class="form-control form-control-lg" id="baby_age" name="baby_age">
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="" class="col-sm-5 col-md-4 col-form-label">Instructions:</label>
                        <div class="col-sm-7 col-md-8">
                            <textarea name="instructions" id="instructions" class="form-control form-control-lg"  rows="4" placeholder=""></textarea>
                        </div>
                        </div>
                        @do_action('admin.reservation.fields');
                    </div>
                </div>
                

                @do_action('post_type.'. $postType .'.form.left')

            </div>

            <div class="col-md-4">
            
               
            </div>
            </div>
            @endcomponent
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> 
        <style>
            .datepicker-inline{
            width: 100%;
            }
            .datepicker table {
            margin: 0;
            
            width: 100%;
        }
        </style>
      
        @do_action('admin.calendar.hooks')
 
        <script>
        var packageRedirect = function(id){
            var durl = "{{url()->current()}}?id="+id+"&date=''";
            window.location = durl;
        }
        $(document).ready(function(){
            var date_input=$('#bookingdate'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            var options={
                format: "dd-mm-yyyy",
                inline:true,
                sideBySide: true,
                container: container,
                todayHighlight: true,
                daysOfWeekDisabled: daysOfWeekDisabled,
                datesDisabled:datesDisabled,
                autoclose: true,
                //startDate: truncateDate(new Date()),
                startDate: new Date(startDate),
                endDate: new Date(endDate),
                icons: {
                            time: "fa fa-clock-o",
                            date: "fa fa-calendar",
                            up: "fa fa-arrow-up",
                            down: "fa fa-arrow-down"
                        },
            };
            date_input.datepicker(options).on('changeDate', showTestDate);
            function showTestDate(){
            var value = $('#bookingdate').datepicker('getFormattedDate');
                $("#date").val(value);
                
            }
            })
        function truncateDate(date) {
        return new Date(date.getFullYear(), date.getMonth(), date.getDate());
        }
            $(document).ready(function(){
                $('#booknow').click(function(){
                var date = $("#date").val();
            var package_id = $("#package_id").val();
                if(date != ""){
                window.location.href = "{{url('/reservations')}}?id="+package_id+"&date="+date;
                } else{
                    alert("Please select date!"); 
                    return false;
                }
            });
            })
        </script>
    

@endsection
