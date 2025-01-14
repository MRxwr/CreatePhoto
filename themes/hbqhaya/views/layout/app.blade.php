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
		    <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/hbqhaya/assets/css/bootstrap.min.css?v=<?php echo rand(0000,9999); ?>">
		<!-- slicknav css -->
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/hbqhaya/assets/css/slicknav.min.css?v=<?php echo rand(0000,9999); ?>">
        <!-- calender css -->
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/hbqhaya/assets/css/calender.css?v=<?php echo rand(0000,9999); ?>">

		<!-- owl carousel css -->
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/hbqhaya/assets/css/owl.carousel.min.css?v=<?php echo rand(0000,9999); ?>">
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/hbqhaya/assets/css/owl.theme.default.min.css?v=<?php echo rand(0000,9999); ?>">
		<!-- magnific css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css?v=<?php echo rand(0000,9999); ?>">
		<!-- slick slider css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css?v=<?php echo rand(0000,9999); ?>">
    <!-- main stylesheet -->
      <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/hbqhaya/assets/css/rome.css?v=<?php echo rand(0000,9999); ?>">
		<!-- main stylesheet -->
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/hbqhaya/assets/style.css?v={{time()}}">
       
        @if(app()->getLocale()=='ar')
          <!-- rtl stylesheet -->
          <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/hbqhaya/assets/css/rtl.css?v={{time()}}">
        @endif

		<!-- responsive stylesheet -->
        <link rel="stylesheet" href="{{asset('/')}}jw-styles/themes/hbqhaya/assets/css/responsive.css?v={{time()}}">

		<!-- ==== HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ==== -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
         <style>
           html, body {
          touch-action: manipulation;
          -ms-touch-action: manipulation;
        }
            .overlay {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 100000000;
	.overlayDoor {
		&:before, &:after {
			content: "";
			position: absolute;
			width: 50%;
			height: 100%;
			background: #707070;
			transition: .5s cubic-bezier(.77,0,.18,1);
			transition-delay: .8s;
		}
		&:before {
			left: 0;
		}
		&:after {
			right: 0;
		}
	}
	&.loaded {
		.overlayDoor {
			&:before {
				left: -50%;
			}
			&:after {
				right: -50%;
			}
		}
		.overlayContent {
			opacity: 0;
			margin-top: -15px;
		}
	}
	.overlayContent {
		position: relative;
		width: 100%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		transition: .5s cubic-bezier(.77,0,.18,1);
		.skip {
			display: block;
			width: 130px;
			text-align: center;
			margin: 50px auto 0;
			cursor: pointer;
			color: #fff;
			font-family: 'Nunito';
			font-weight: 700;
			padding: 12px 0;
			border: 2px solid #fff;
			border-radius: 3px;
			transition: 0.2s ease;
			&:hover {
				background: #ddd;
				color: #444;
				border-color: #ddd;
			}
		}
	}
}
.loader {
	width: 128px;
	height: 128px;
	border: 3px solid #fff;
	border-bottom: 3px solid transparent;
	border-radius: 50%;
	position: relative;
	animation: spin 1s linear infinite;
	display: flex;
	justify-content: center;
	align-items: center;
	.inner {
		width: 64px;
		height: 64px;
		border: 3px solid transparent;
		border-top: 3px solid #fff;
		border-radius: 50%;
		animation: spinInner 1s linear infinite;
	}
}
@keyframes spin {
	0% {
		transform: rotate(0deg);
	}
	100% {
		transform: rotate(360deg);
	}
}
@keyframes spinInner {
	0% {
		transform: rotate(0deg);
	}
	100% {
		transform: rotate(-720deg);
	}
}
        </style>
        @do_action('theme.header')

        @yield('header')
        <script>
          var startDate='2022-05-01';
          var endDate='2023-12-31';
          var datesDisabled = ["13-03-2022"];
          var daysOfWeekDisabled = [5,6];
          var bookedDates = ["13-03-2022"];
        </script>
	</head>

	<body class="common-style {{ isset($post) ? ' single-post': ' home_bg' }} {{ body_class() }}">
	     <div class="overlay">
        	<div class="overlayDoor"></div>
        	<div class="overlayContent">
        		<div class="loader">
        			<div class="inner"></div>
        		</div>
        	</div>
        </div>
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
        <script src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/js/jquery.min.js?v=<?php echo rand(0000,9999); ?>"></script>

        <!-- bootstrap script -->
		    <script src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/js/bootstrap.bundle.min.js?v=<?php echo rand(0000,9999); ?>"></script>
        <!-- calendar script -->
		    <script src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/js/calendar.js?v=<?php echo rand(0000,9999); ?>"></script>

         <!-- magnific Script -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js?v=<?php echo rand(0000,9999); ?>"></script>
        <!-- slicknav Script -->
        <script src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/js/jquery.slicknav.min.js?v=<?php echo rand(0000,9999); ?>"></script>
        <script src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/js/owl.carousel.min.js?v=<?php echo rand(0000,9999); ?>"></script>

        <!-- slick slider Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js?v=<?php echo rand(0000,9999); ?>?v=<?php echo rand(0000,9999); ?>"></script>
        <!-- main script -->
        <script src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/js/rome.js?v=<?php echo rand(0000,9999); ?>"></script>
        <!-- main script -->
        <script src="{{asset('/')}}jw-styles/themes/hbqhaya/assets/js/main.js?v=<?php echo rand(0000,9999); ?>"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js?v=<?php echo rand(0000,9999); ?>"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css?v=<?php echo rand(0000,9999); ?>"/> 
        <style>
         .datepicker {
           z-index: 9999 !important; /* Ensure datepicker shows above other elements */
          }
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
            /*.datepicker table tr td.disabled.day {*/
            /*   color: #FCBACB!important;*/
            /*}*/
            .datepicker table tr td.disabled.day.fullbooked {
               color: #FCBACB!important;
            }
           .datepicker table tr td.disabled-date.day {
              color: #FCBACB !important;
            }
            .datepicker table tr td.weekend-day.day {
              color: #0d6efd !important;
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
      
  
        <script>
          
        $(document).ready(function(){
          $('#booknow').click(function(){
              
              var currentDate = new Date();
              var year = currentDate.getFullYear();
              var month = currentDate.getMonth() + 1; // Months are zero-based
              var day = currentDate.getDate();
              var formattedDate = day + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + year;
              var date = formattedDate;
              $('#date').val(formattedDate);
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
                //alert(params);
                //window.location.href = "{{url('/reservations')}}?id="+package_id+params;
                 $('#resarvation-form').submit()
              } else{
                alert("Please select date!"); 
                return false;
              }
            });
          })
        </script>
  
<script>
$(document).ready(function(){
  //set_package_price();
  //calculate_price();
	$('#book-btn').click(function(){
		var searchquery = $("input#bookingid").val();
		var otpquery = $("input#bookingOtp").val();
        var dataString = 'mobile='+searchquery+'&otp='+otpquery;
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
//   $("body").on("click", ".xprice", function(e) {
//     //alert('okey')
//     calculate_price();
//   });


//   var set_package_price = function(){
//   var package_price = $("#booking_price").val();
//     localStorage.setItem("total_price",package_price);
//     localStorage.setItem("package_price",package_price);
//     localStorage.setItem("exprice",0.00);
//     localStorage.setItem("noofpieces_price",0.00);
//     localStorage.setItem("picture_type_price",0.00);
//     //alert(package_price);
//     $("#booking_total_price").val(package_price);
//     $('#totalprice').text(package_price+'KD');
//   }

//   var calculate_price = function(){
//     var exprice = 0.00;
//     //var package_price = $('#booking_price').val()
//     var package_price = localStorage.getItem("package_price");
//     var noofpieces_price = localStorage.getItem("noofpieces_price");
//     var picture_type_price = localStorage.getItem("picture_type_price");
//     setTimeout( function() 
//       {
//           $("input:checkbox[name='service_item[]']:checked").each(function(){
//             exprice = parseFloat(exprice) + parseFloat($(this).attr('data-exprice'));
//           });
//           localStorage.setItem("exprice",exprice);
//           var itemval=35.500;
//           var total_price =  (parseFloat(package_price) + parseFloat(exprice) + parseFloat(noofpieces_price) + parseFloat(picture_type_price)); 
//           localStorage.setItem("total_price",total_price);
//           $("#booking_total_price").val(total_price);
//           $('#totalprice').text(total_price+'KD');
//       }, 2000);
      
//   }

 </script>  
      @yield('footer')
      @do_action('theme.footer')
       <script>
          $(document).ready(function() {
            	// Users can skip the loading process if they want.
            // 	$('.skip').click(function() {
            // 		$('.overlay, body').addClass('loaded');
            // 	})
            	
            	// Will wait for everything on the page to load.
            	$(window).bind('load', function() {
            		$('.overlay, body').addClass('loaded');
            		setTimeout(function() {
            			$('.overlay').css({'display':'none'})
            		}, 2000)
            	});
            	
            	// Will remove overlay after 1min for users cannnot load properly.
            	setTimeout(function() {
            		$('.overlay, body').addClass('loaded');
            		$('.overlay').css({'display':'none'})
            	}, 5000);
            })
      </script>
    </body>
</html>

