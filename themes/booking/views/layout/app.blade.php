<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir ="{{(app()->getLocale()=='ar'?'rtl':'ltr' )}}"  class="{{(app()->getLocale()=='ar'?'rtl':'ltr' )}}">
    
	<head>
		<!-- site meta -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{{ $description ?? '' }}">
        <meta name="turbolinks-cache-control" content="no-cache">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:description" content="{{ $description ?? '' }}">
        <meta name="twitter:card" content="summary">
        <meta property="twitter:title" content="{{ $title }}">
        <meta property="twitter:description" content="{{ $description ?? '' }}">

        @if($icon = get_icon())
            <link rel="icon" href="{{ $icon }}" />
        @endif
		   <!-- site title -->
		   <title>{{ $title }} </title>
		<!-- bootstrap css -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<script src="https://use.fontawesome.com/245c9398b0.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/booking/assets/css/style.css?v=101">
            @if(app()->getLocale()=='ar')
            <!-- rtl stylesheet -->
            
            @endif
        @do_action('theme.header')

        @yield('header')
        <script>
          var startDate='2022-05-01';
          var endDate='2023-12-31';
          var datesDisabled = ["13-03-2022"];
          var daysOfWeekDisabled = [5,6]
        </script>
	</head>

	<body class="common-style {{ isset($post) ? ' single-post': ' home_bg' }} {{ body_class() }}">
		<div class="container-fluid p-0">
		 <div class="row w-100 m-0">
			<div class="col-12 p-0" id="leftSide">
            @do_action('theme.after_body')
             @include('theme::header')
            <!-- rest of page -->
            @yield('content')
            @include('theme::footer')
        </div>	

        <div class="col-6 p-0 d-none d-md-block" id="rightSide">
            <div class="rightBg"></div>
            <div class="bgOver"></div>
            <div class="logoBg">
            <img src="{{ upload_url(get_config('logo')) }}" class="logo">
            </div>
            <img src="{{asset('/')}}jw-styles/themes/booking/assets/images/BW29zDw.jpg" class="poweredByRight">
        </div>			
    </div>
  </div>
	
  <script src="{{asset('/')}}jw-styles/themes/booking/assets/js/calendar.js"></script>
        <script src="{{asset('/')}}jw-styles/themes/booking/assets/js/script.js?v=108"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> 
        <style>
          .datepicker-inline{
            width: 100%;
          }
          .datepicker table {
            margin: 10px;
            width: 100%;
          }
          .datepicker table tr td, .datepicker table tr th {
                cursor: pointer;
                text-align: center;
                line-height: 0;
                width: 50px !important;
                height: 50px !important;
                font-size: 18px;
                font-weight: 700;
                color: #3D3D3D;
            }
            .datepicker table tr th.next, .datepicker table tr th.prev, .datepicker table tr th.datepicker-switch{
                font-size: 24px;
                font-weight: 700;
                color: #3D3D3D;
            }
            .datepicker table tr td.disabled {
                color: #FCBACB!important;
            }
            .themeCheck input {
              position: absolute;
              opacity: 1!important;
              top: 8px;
              height: 27px;
              width: 27px;
              background-color: #fff;
              border: 1px solid #707070;
            }
        </style>
      @if(isset($post) &&Request::segment(1)=='package' )
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
          
        $(document).ready(function(){
          $('#booknow').click(function(){
              var date = $("#date").val();
              var package_id = $("#package_id").val();
              var theme_category = $("#theme_category").val();
              //alert(package_id);
              var theme_id = $("input[name='theme_id']:checked").val();
              var params='';
              if(date != ""){
                params = "&date="+date;
                if(theme_id>0){
                  params = params +"&theme_id="+theme_id;
                }
                if(theme_category){
                  params = params +"&category="+theme_category;
                }
                window.location.href = "{{url('/reservations')}}?id="+package_id+params;
              } else{
                alert("Please select date!"); 
                return false;
              }
            });
          })
        </script>
  
<script>
$(document).ready(function(){
  set_package_price();
  //calculate_price();
	$('#book-btn').click(function(){
		var searchquery = $("input#bookingid").val();
    var dataString = 'searchquery='+searchquery;
	if(searchquery != ''){
    $('#bars1').show();
		$.ajax({
				type:'GET',
				url:'?ajaxpage=getBookingDetailsAjax',
				data: dataString,
				success:function(html){
          setTimeout(() => {
            $('#bars1').hide();
            $('#bookingDataDiv').html(html);
            $('#datable_1').DataTable({
              "bFilter": true,
              "bLengthChange": false,
              "bPaginate": true,
              "bInfo": false,
              });
            }, 1000);
				}
			}); 
		} else {
			alert("Please enter reservation number!");
			return false;
		}
	});


  

	
});

$("#contactForm").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitForm();
});
function submitForm(){
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var subject = $("#subject").val();
    var message = $("#message").val();
  $('#bars1').show();
  $.ajax({
        type: "POST",
        url: "pages/contactFormAjax.php",
        data: "name=" + name + "&email=" + email + "&phone=" + phone + "&subject=" + subject + "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
                setTimeout(() => {
                  $('#bars1').hide();
                  formSuccess();
                  }, 1000);
                
            }
        }
    });
}
function formSuccess(){
    $( "#msgSubmit" ).removeClass( "hidden" );
}
  $("body").on("click", ".xprice", function(e) {
    //alert('okey')
    calculate_price();
  });


  var set_package_price = function(){
   var package_price = $("#booking_price").val();
    localStorage.setItem("total_price",package_price);
    localStorage.setItem("package_price",package_price);
    localStorage.setItem("exprice",0.00);
    localStorage.setItem("noofpieces_price",0.00);
    localStorage.setItem("picture_type_price",0.00);
    //alert(package_price);
    $("#booking_total_price").val(package_price);
    $('#totalprice').text(package_price+'KD');
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
      @yield('footer')
      @do_action('theme.footer')	
</body>
</html>
    
    
   
