@extends('juzaweb::layouts.frontend')

@section('content')
@php
    $post = Sbhadra\Photography\Models\Package::find($_REQUEST['id']);
    $settings = Sbhadra\Photography\Models\Setting::all()->toArray();
    $config=array();
    foreach($settings as $setting){
        $config[$setting["field_key"]] = $setting["field_value"];
    }
    //dd($config['is_delivery']);
@endphp
<!-- breadcrumbs -->
<!-- @do_action('theme.breadcrumbs')  -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
      .owl-carousel .owl-stage-outer {
        overflow: hidden!important;
        }
        .container_radio:not(.themeCheck) {
          font-size: 18px;
        }
        #CheckBoxPopover {
    -webkit-transition: all 1s ease;
       -moz-transition: all 1s ease;
        -ms-transition: all 1s ease;
         -o-transition: all 1s ease;
            transition: all 1s ease;    
}
  </style>
  <!-- breadcrumbs -->
 <!-- Personal Informations -->
 <section class="personal-info py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="row">
                            <div class="col-xl-12 pb-5">
                                <div class="site-title position-relative d-flex align-items-center">
                                    <div class="bg-white">
                                        <h3 class="fs30 text-300 SegoeUIL pe-4">
                                             @lang('theme::app.Personal_Informations')
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form id="booking_form" class="personal-information" method="post" action="{{url('payment')}}">
            <div class="container">
                {!! csrf_field() !!}
                <!-- <input type="hidden" id="theme_id" name="theme_id[]" value="" /> -->
                <input class="form-control" id="booking_price" name="booking_price" value="" type="hidden"  />
                <input class="form-control" id="booking_total_price" name="total_price" value="" type="hidden"  />
                
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <!-- package-item -->
                        <div class="px-xxl-5">
                            <div class="row">
                        <div class="col-xl-12">
                            <div class="package-head bg-light radius15 mh53 py-1 px-3 mb-5 d-inline-flex align-items-center">
                                <h4 class="fs23">
                                    @lang('theme::app.Choose_Preferred_Day'):
                                </h4>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <input type="hidden" name="id" id="id" value="{{ $post->id }}">
                            <input type="hidden" name="package_id" id="package_id" value="{{ $post->id }}">
                            <input type="hidden" name="theme_category" id="theme_category" value="@if($_REQUEST['category']){{$_REQUEST['category']}} @endif">
                            <input class="form-control" id="date" name="booking_date" placeholder="MM/DD/YYY" type="hidden"  />
                            <input class="form-control" id="bdate" name="bdate" placeholder="MM/DD/YYY" type="text" readonly="readonly" style="border: none; background-color: #FFF;"/>
                            <div id="bookingdate"></div>
                        </div>
                        <div class="col-xl-4 pt-5 mt-xl-4">
                            <ul class="pb-3">
                                <li class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/available.svg" alt="img" class="ms-2 me-3 mt-2">
                                        <div>
                                            <h4 class="fs25 mb-2">
                                               @lang('theme::app.available'):
                                            </h4>
                                            <h6 class="fs18">
                                                @lang('theme::app.Available_Sessions'):
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/reserved.svg" alt="img" class="ms-2 me-3 mt-2">
                                        <div>
                                            <h4 class="fs25 mb-2">
                                            @lang('theme::app.reserved')
                                            </h4>
                                            <h6 class="fs18">
                                                
                                                @lang('theme::app.Fully_Booked')
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/vacation.svg" alt="img" class="ms-2 me-3 mt-2">
                                        <div>
                                            <h4 class="fs25 mb-2">
                                                @lang('theme::app.Vacation')
                                            </h4>
                                            <h6 class="fs18">
                                                @lang('theme::app.Holiday_Or_Weekends')
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                           
                        </div>
                    </div>
                            <div class="row package-item">
                            <!--@apply_filters('theme.reservation.data')-->
                            @apply_filters('cstudio.reservation.time')
                            @do_action('theme.reservation.picturetype')
                            </div>
                            <div class="row package-item" id="dateSevices">
                                 @apply_filters('cstudio.reservation.services')
                            </div>
                            <div class="row package-item">
                                <div class="col-sm-12 pe-xl-5 pt-4">
                                    <div class="package-head bg-light radius15 mh53 py-1 px-3 mb-4 d-inline-flex align-items-center">
                                        <h4 class="fs23 SegoeUIL">
                                          @lang('theme::app.informations'):
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-xxl-8 pe-xl-5 pt-4">
                                    <div class="personal-form row">
                                        <div class="col-xxl-10 pb-3">
                                            <label>
                                               @lang('theme::app.customer_name'): 
                                            </label>
                                            <input type="text" class="border" id="customer_name" name="customer_name" required >
                                        </div>
                                        <input type="hidden" class="form-control form-control-lg" id="customer_email" name="customer_email" value="hello@myshootskw.com" required>
                                        <div class="col-xxl-10 pb-3" style="display:none">
                                            <label>
                                            @lang('theme::app.baby_name'):
                                            </label>
                                            <input type="text" class="border" id="baby_name" name="baby_name">
                                        </div>
                                        <div class="col-xxl-10 pb-3">
                                            <label>
                                              @lang('theme::app.mobile_number'):
                                            </label>
                                            <input type="text" class="border" id="mobile_number" name="mobile_number" required>
                                        </div>
                                        <div class="col-xxl-10 pb-3">
                                            <label>@lang('theme::app.baby_age'):</label>
                                            <input type="text" class="border"  id="baby_age" name="baby_age">
                                        </div>
                                         <?php if($config['is_delivery']==1) { ?>
                                        <!--  <div class="col-xxl-5 pb-3">-->
                                        <!--    <label>@lang('theme::app.need_delivery'):-->
                                        <!--       <input type="checkbox" class="border"  id="need_delivery" name="need_delivery" style="min-height: 30px;width: 40px; margin-right:55px">-->
                                        <!--    </label>-->
                                        <!--</div>-->
                                        <div class="col-xxl-10 pb-3" id="address_fld" >
                                            <label>@lang('theme::app.address'):</label>
                                            <input type="text" class="border englishInput"  id="address" name="address" placeholder="@lang('theme::app.address')">
                                        </div>
                                        <?php }else{ ?>
                                         <input type="hidden"   id="address" name="address" >

                                        <?php }?>
                                        
                                        <div class="col-xxl-10 py-3">
                                            <label class=".opacity0">
                                                @lang('theme::app.instructions'):
                                            </label>
                                            <textarea class="border" rows="6" placeholder="@lang('theme::app.instructions')" name="instructions" id="instructions"></textarea>
                                        </div>
                                        @apply_filters('theme.reservation.fields')
                                       
                                    </div>
                                </div>
                                <div class="col-sm-12 pe-xl-5 pt-4">
                                    <div style="width:220px;"  class="package-head bg-success radius15 mh67 py-1 px-3 mb-4   align-items-center"> 
                                       <h4 id="totalprice" class="fs23 text-success" style="padding: 20px;"></h4>
                                    </div>
                                    <div class="package-head bg-danger radius15 mh67 py-1 px-3 mb-4 d-inline-flex align-items-center">
                                        <h4 class="fs23 text-danger">
                                            @lang('theme::app.Deposit')
                                             <!--<span class="text-600">35.500 KD</span> -->
                                             @do_action('theme.fixedprice.text') 
                                            @lang('theme::app.deposit_note')  
                                        </h4>
                                    </div>
                                    <div class="package-head bg-danger radius15 mh67 py-1 px-3 mb-4 d-inline-flex align-items-center">
                                        <h4 class="fs23 text-danger">
                                             @lang('theme::app.transaction_fees')  
                                        </h4>
                                       
                                    </div>
                                    <!-- <label class="container_radio d-flex align-items-center">
                                              I agree with the <a href="index551d.html?page=terms-and-condition" targer="_blank">Terms and Condition</a> 
                                                <input type="checkbox" name="extras"  name="termsandcondition" required>
                                                <span class="checkmark"></span>
                                                <div class="bg-light text-dark radius15 mh53 py-1 px-3 ms-2 d-inline-flex align-items-center">
                                                    <h4 class="fs23">
                                                        tick
                                                    </h4>
                                                </div>
                                    </label> -->
                                    
                                </div>
                                <div class="col-sm-12 pe-xl-5 pt-4">
                                     <div id="error-note" class="text-danger" style="margin:15px; color:red"></div>
                                        <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                         <div class="d-flex mb-3"> 
                                            <input type="checkbox" id="agree" name="agree" value="1" required="required" style="width:24px; height:24px;margin:5px;">
                                            <a href="#"  id="booking_modal_now" style="font-size:20px"> Agree with   @lang('theme::app.terms_and_condition') <sup style="color:red">*</sup></a>
                                        </div>
                                      <!--<a href="#" class="btn btn-lg btn-light fs32 radius30" id="booking_modal_now" >-->
                                      <!--   @lang('theme::app.continue_to_payment')-->
                                      <!--</a>-->
                                      <button  type="submit"  name="submit"  class="btn bbtn btn-sm btn-light fs25 radius30" id="loader" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Booking">@lang('theme::app.Procced_to_payment')</button>
                                    <div class="col-xxl-8 pe-xl-5 pt-4">
                                      <div class="personal-form row">
                                           @do_action('theme.coupon.fields') 
                                         </div>
                                      </div>
                                     <!-- custom-popup -->
                                     
                                      <div class="custom-popup modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-lg  modal-dialog-centered">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <div class="package-head bg-light radius15 mh53 py-1 px-4 d-inline-flex align-items-center">
                                                          <h4 class="fs24">
                                                              @lang('theme::app.terms_and_condition')
                                                          </h4>
                                                      </div>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                          <img src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/img/popup_close.svg" alt="img">
                                                      </button>
                                                  </div>
                                                  <div class="modal-body px-sm-5">
                                                     
                                                     @do_action('theme.terms.content')  
                                                     
                                                  </div>
                                                  <div class="modal-footer d-flex align-items-center justify-content-center mb-3"></div>
                                                  
                                              </div>
                                          </div>
                                      </div>
                                      <!-- custom-popup -->
                                </div>
                            </div>
                        </div>
                        <!-- package-item -->
                    </div>
                </div>
           
            </div>
            </form>
        </section>
        <div id='CheckBoxPopover' class="popover fade right in" style="display: hidden;">
    <div class="arrow"></div>
    <h3 class="popover-title"></h3>
    <div class="popover-content"></div>
</div>
        <!-- Personal Informations -->
@endsection
@section('footer')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      @if(isset($post) &&Request::segment(1)=='reservations' )
        @apply_filters('theme.calendar.hooks',$post)
      @endif
      <script>
          $(document).ready(function(){
              
            $('#booking_price').val(0.00);
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
                minDate: new Date(),
                startDate: truncateDate(),
                //startDate: new Date(startDate),
                endDate: new Date(endDate),
                 beforeShowDay: function (date) {
                     // Convert the current date to 'DD-MM-YYYY' format for comparison
                    const day = String(date.getDate()).padStart(2, '0');
                    const month = String(date.getMonth() + 1).padStart(2, '0');
                    const year = date.getFullYear();
                    const dateString = `${day}-${month}-${year}`;
                    //console.log(dateString);
                    // Add custom class to Mondays
                    var dayOfWeek =String(date.getDay()) ;
                    // Check if the date is in the bookedDates array
                     if (bookedDates.includes(dateString)) {
                          console.log(dateString);
                         return {
                            classes: 'fullbooked'
                         };
                    }
                        
                    //console.log(dayOfWeek);
                    if ($.inArray(dayOfWeek, daysOfWeekDisabled) !== -1) {
                    return {
                        classes: 'weekend-day'
                    };
                 }
                return {};
              },
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
                  $("#bdate").val(value);
                  const dataToSend = {
                    id:{{$_GET['id']}},
                    date:value,
                };
                 $.ajax({
    				type:"GET",
    				url: "?ajaxpage=getTimeSlotsByType",
    			    data: dataToSend,
    				success:function(result){
    				    if(result){
    				       $("#booking_time").html(result); 
    				    }else{
    				        $("#zxsxd").show(); 
    				    }
    				    setTimeout(function() {
                          var selectElement = $('#booking_time');
                          // Count the number of options
                          var numberOfOptions = selectElement.find('option').length;
                          if(numberOfOptions<=1){
                              $('#zxsxd').css('display', 'block');
                              $('#booking-now6312563').css('display', 'none');
                          }
                        //alert(numberOfOptions);
                      }, 1500);
    				    
    				}
    			});
    			
    			$.ajax({
    				type:"GET",
    				url: "?ajaxpage=getServicesByDate",
    			    data: dataToSend,
    				success:function(result){
    				    if(result){
    				       $("#dateSevices").html(result); 
    				    }else{
    				        $("#zxsxd").show(); 
    				    }
    				    setTimeout(function() {
                          
                      }, 1500);
    				    
    				}
    			});
                  
                }
            })
          function truncateDate(date) {
            //alert(startDate);
            var date = new Date();
            var st = new Date(startDate);
            if(st.getTime()>date.getTime()){
              return new Date(startDate);
            }else{
              return new Date(date.getFullYear(), date.getMonth(), date.getDate());
            }
            
          }
        </script>
   <script>
    $(document).ready(function() {
          $("#booking_form").validate({ 
            errorLabelContainer: "#error-note",
            wrapper: "li",
            rules: {
                booking_time: {
                    required: true,
                    number: true
                },
                customer_name: {
                    required: true,
                    //minlength: 2
                },
                
                 mobile_number: {
                    required: true,
                    digits: true,
                    minlength: 8,
                    maxlength: 8
                },
                 baby_age: {
                    required: true,
                    // digits: true,
                    // minlength: 1,
                    // maxlength: 3
                },
                 bdate: {
                    required: true,
                },
                address: {
                    required: true,
                    // required: function () {
                    //   return $("#need_delivery").is(":checked");
                    // }
                  },
                 
                agree: {
                    required: true
                }
            },
            messages: {
                 booking_time: {
                    required: "الرجاء اختيار الوقت المفضل",
                    number: "الرجاء اختيار الوقت المفضل"
                },
                customer_name: {
                    required: "الرجاء ادخال الاسم",
                    //minlength: "يجب ادخال على الأقل ثلاثة حروف في خانة الاسم"
                },
             
                mobile_number: {
                  required: "الرجاء ادخال رقم الهاتف",
                  digits: "الرجاء ادخال رقم هاتف صحيح",
                  minlength: "يجب أن يتكون رقم الهاتف من ثمانية أرقام",
                  maxlength: "يجب أن يتكون رقم الهاتف من ثمانية أرقام"
                 },
                 baby_age: {
                  required: "الرجاء ادخال عمر الطفل",
                  //digits: "الرجاء ادخال عمر طفل صحيح",
                  //minlength: "يجب أن يتكون عمر الطفل على الاقل رقم واحد",
                  //maxlength: "يجب أن يتكون عمر الطفل على رقمين بالكثير"
                 },
                 baby_age: {
                  required: "الرجاء ادخال عمر الطفل",
                  //digits: "الرجاء ادخال عمر طفل صحيح",
                  //minlength: "يجب أن يتكون عمر الطفل على الاقل رقم واحد",
                  //maxlength: "يجب أن يتكون عمر الطفل على رقمين بالكثير"
                 },
                 address:{ 
                     required: "العنوان مطلوب عند تحديد خانة الاختيار."
                 },
                agree: {
                    required: "أوافق على الشروط و الأحكام",
                }
            },
            submitHandler: function (form) { // for demo
              $("button[type='submit']").prop("disabled", true);
                $('.overlay, body').removeClass('loaded');
                $('.overlay').css({'display':'block'})
                $("#booking_form").submit();
              
            }
        });
         $('#mobile_number').on('input', function(e){
            // Get the entered value
            var enteredValue = $(this).val();
            // Remove non-numeric characters using a regular expression
            var numericValue = enteredValue.replace(/\D/g, '');
            // Limit to a maximum of 8 digits
            var maxLength = 8;
            if (numericValue.length > maxLength) {
              numericValue = numericValue.slice(0, maxLength);
            }
            // Update the input field with the numeric value
            $(this).val(numericValue);
          });
    });
  </script>
 
                		
  <script>
        $(".open_time").on('click', function(event){
            $( ".open_time" ).removeClass("active");
            $(this).addClass("active");
            $('#booking_time').val(this.id);
            //alert(this.id);
        });
        
        $("#booking_time").on('change', function(event){
            var slot_id =  $('#booking_time').val();
            var date =  $('#date').val();
             const dataToAjax = {
                    id:{{$_GET['id']}},
                    date:date,
                    slot:slot_id,
                };  
              $.ajax({
    				type:"GET",
    				url: "?ajaxpage=getServicesByDate",
    			    data: dataToAjax,
    				success:function(result){
    				    if(result){
    				       $("#dateSevices").html(result); 
    				    }else{
    				        $("#zxsxd").show(); 
    				    }
    				    setTimeout(function() {
                          
                      }, 1500);
    				    
    				}
    			});
           
        });
    </script>
    
    <script>
    $(document).ready(function(){
        set_package_price();
      
        $("#booking_modal_now").on('click', function(event){
            var booking_time = $('#booking_time').val();
            var booking_total_price = $('#booking_total_price').val();
            var stat=0;
           // alert(booking_time);
            if(booking_total_price>0 && booking_time!='' ){
                stat=1;
            }
            if(stat==1){
                // $('#booking_form').submit(); 
                 $('#exampleModal').modal('show'); 
               
            }else{
                alert('Please select time slot and Package type');
            }
            //$('#exampleModal').modal('show');
        });

      
        
          $('#need_delivery').on('change', function(evt) {
            if($("#need_delivery").is(':checked')){ 
                $("#address_fld").css('display','inherit');
                $("#address").prop('required',true);
                
             } else { 
                $("#address_fld").css('display','none');
                $("#address").prop('required',false);
             }
          });
          
        var $pop = $("#CheckBoxPopover");
    });
    
      $("body").on("click", ".xprice", function(e) {
          if ($(this).is(":checked")) {
              var messageValue = $(this).attr('data-message');
              //alert(messageValue);
              var id = $(this).val();
              if (messageValue !== null && messageValue !== undefined) {
                  $('#pop'+id).html('<span class="pop"> '+messageValue+' </span>');
               }
          }else{
              var id = $(this).val();
              $('#pop'+id).html('');
          }
        //   if($(this).attr('message')!==null){
        //       
        //   }
        //setPopover(this);
            calculate_price();
       });

        function setPopover(element) {
        setPopoverPosition(element);
        if ($(element).is(":checked")) {
            var title = $(element).attr("message");
            $pop.find("h3.popover-title").text(title);
            $pop.show();
        } else {
            var $checkedBoxes = $('.checkBoxTips input:checked')
            if ($checkedBoxes.length >0) {
                setPopover($checkedBoxes[0]);
            } else {
                $pop.hide();
            }
        }
    }
    
    function setPopoverPosition(element) {
        var $pop = $("#CheckBoxPopover");
        var offset = $(element).offset();
        $pop.css('left',offset.left + 20);
        $pop.css('top',offset.top - 25);
    }
      var set_package_price = function(){
       var package_price = $("#booking_price").val();
       //alert(package_price)
        localStorage.setItem("total_price",package_price);
        localStorage.setItem("package_price",package_price);
        localStorage.setItem("exprice",0.00);
        localStorage.setItem("noofpieces_price",0.00);
        localStorage.setItem("picture_type_price",0.00);
        $("#booking_total_price").val(package_price);
        $('#totalprice').text(package_price+'KD');
         setTimeout( function() {
            var exprice = localStorage.getItem("exprice");
            var package_price = localStorage.getItem("package_price");
            var noofpieces_price = localStorage.getItem("noofpieces_price");
            var picture_type_price = 0.00;
            picture_type_price = $("input[name=pictures_type]:checked").attr("data-price");
            $("#pictures_type_price").val(picture_type_price);
            
            localStorage.setItem("picture_type_price",picture_type_price);
            var total_price =  (parseFloat(package_price) + parseFloat(exprice) + parseFloat(noofpieces_price) + parseFloat(picture_type_price)); 
            
            localStorage.setItem("total_price",total_price); 
            $("#booking_total_price").val(total_price);
            $("#totalprice").text(total_price+"KD");
          }, 2000);
      }
    
    var calculate_price = function(){
    
    var exprice = 0.00;
    //var package_price = $('#booking_price').val()
    var package_price = localStorage.getItem("package_price");
    var noofpieces_price = localStorage.getItem("noofpieces_price");
    var picture_type_price = localStorage.getItem("picture_type_price");
    setTimeout( function() 
      {
          $("input:checkbox[name='service_item[]']:checked").each(function(){
            exprice = parseFloat(exprice) + parseFloat($(this).attr('data-exprice'));
          });
          localStorage.setItem("exprice",exprice);
          var itemval=35.500;
          var total_price =  (parseFloat(package_price) + parseFloat(exprice) + parseFloat(noofpieces_price) + parseFloat(picture_type_price)); 
          localStorage.setItem("total_price",total_price);
          $("#booking_total_price").val(total_price);
          $('#totalprice').text(total_price+'KD');
      }, 2000);
      
   }
    
</script>
<script>
  // Get the select element
  const selectElement = document.getElementById('booking_time');
  // Keep only the first option
  while (selectElement.options.length > 1) {
    selectElement.remove(1);
  }
</script>
@endsection