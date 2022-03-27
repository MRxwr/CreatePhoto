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
		   <title>{{ $title }}</title>
		<!-- bootstrap css -->
		<link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/cstudio/assets/css/bootstrap.min.css">
		<!-- slicknav css -->
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/cstudio/assets/css/slicknav.min.css">
        <!-- calender css -->
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/cstudio/assets/css/calender.css">

		<!-- owl carousel css -->
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/cstudio/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/cstudio/assets/css/owl.theme.default.min.css">
		<!-- magnific css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
		<!-- slick slider css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<!-- main stylesheet -->
<link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/cstudio/assets/css/rome.css">
		<!-- main stylesheet -->
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/cstudio/assets/style.css">

		<!-- responsive stylesheet -->
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/cstudio/assets/css/responsive.css">

		<!-- ==== HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ==== -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        @do_action('theme.header')

        @yield('header')
        <script>
          var startDate='2022-01-01';
          var endDate='2046-12-31';
          var datesDisabled = ["13-03-2022"];
          var daysOfWeekDisabled = [5,6]
        </script>
	</head>
	<body class="common-style">
        @do_action('theme.after_body')
        <!-- site-header -->
         @include('theme::header')
        <!-- site-header -->
          @yield('content')
        <!-- instagram-section -->

        <!-- site-footer -->
            @include('theme::footer')
        <!-- site-footer -->

		<!-- jquery script -->
        <script src="{{asset('/')}}jw-styles/themes/cstudio/assets/js/jquery.min.js"></script>

        <!-- bootstrap script -->
		    <script src="{{asset('/')}}jw-styles/themes/cstudio/assets/js/bootstrap.bundle.min.js"></script>
        <!-- calendar script -->
		    <script src="{{asset('/')}}jw-styles/themes/cstudio/assets/js/calendar.js"></script>

         <!-- magnific Script -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- slicknav Script -->
        <script src="{{asset('/')}}jw-styles/themes/cstudio/assets/js/jquery.slicknav.min.js"></script>
        <script src="{{asset('/')}}jw-styles/themes/cstudio/assets/js/owl.carousel.min.js"></script>

        <!-- slick slider Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <!-- main script -->
        <script src="{{asset('/')}}jw-styles/themes/cstudio/assets/js/rome.js"></script>
        <!-- main script -->
        <script src="{{asset('/')}}jw-styles/themes/cstudio/assets/js/main.js"></script>
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
        </style>
      @if(isset($post) &&Request::segment(1)=='package' )
        @apply_filters('theme.calendar.hooks',$post)
      @endif
      <script>
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
        </script>
  
        <script>
          
        $(document).ready(function(){
          $('#booknow').click(function(){
              var date = $("#date").val();
              var package_id = $("#package_id").val();
              var theme_id = $("input[name='theme_id']:checked").val();
              var params='';
              if(date != ""){
                params = "&date="+date;
                if(theme_id>0){
                  params = params +"&theme_id="+theme_id;
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

$("#booking_time").change(function(){
    var date = $("#booking_date").val();
    var time = this.value;
    var dataString = 'time='+time+'&date='+date;
	$.ajax({
				type:'POST',
				url:'pages/checkBookingDateTimeAjax.php',
				data: dataString,
				success:function(result){
					if(result == 1){
             $('#continue_to_payment').prop('disabled', true);
             $('#booking_time').prop('selectedIndex',0);
						 alert("Please select other time!");
					} else{
						$('#continue_to_payment').prop('disabled', false);
          }
                
				}
			}); 
			
		
			setInterval(fetchdata,900000);
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
</script>  
      @yield('footer')
      @do_action('theme.footer')
    
    </body>
</html>