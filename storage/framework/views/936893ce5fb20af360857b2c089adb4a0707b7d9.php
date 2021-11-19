<!DOCTYPE html><html lang="<?php echo e(app()->getLocale()); ?>"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content="<?php echo e($description ?? ''); ?>"><meta name="turbolinks-cache-control" content="no-cache"><meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"><meta property="og:title" content="<?php echo e($title); ?>"><meta property="og:type" content="website"><meta property="og:url" content="<?php echo e(url()->current()); ?>"><meta property="og:description" content="<?php echo e($description ?? ''); ?>"><meta name="twitter:card" content="summary"><meta property="twitter:title" content="<?php echo e($title); ?>"><meta property="twitter:description" content="<?php echo e($description ?? ''); ?>"> <?php if($icon = get_icon()): ?><link rel="icon" href="<?php echo e($icon); ?>" /> <?php endif; ?><title><?php echo e($title); ?></title><link href="<?php echo e(asset('/')); ?>jw-styles/themes/myshoots/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="<?php echo e(asset('/')); ?>jw-styles/themes/myshoots/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"><link href="<?php echo e(asset('/')); ?>jw-styles/themes/myshoots/assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"><link href="<?php echo e(asset('/')); ?>jw-styles/cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" rel="stylesheet"><link rel="stylesheet" href="<?php echo e(asset('/')); ?>assets/css/style-nrtl7f56.css?az=2"><link rel="stylesheet" href="<?php echo e(asset('/')); ?>jw-styles/themes/myshoots/assets/vendor/owlcarousel/owl.carousel.css"><link rel="stylesheet" href="<?php echo e(asset('/')); ?>jw-styles/themes/myshoots/assets/vendor/owlcarousel/owl.theme.default.css"><link rel="stylesheet" href="<?php echo e(asset('/')); ?>/jw-styles/themes/myshoots/assets/css/lightbox.min.css"><link href="<?php echo e(asset('/')); ?>jw-styles/themes/myshoots/assets/css/landing-page9830.css?y=2" rel="stylesheet"><link href="<?php echo e(asset('/')); ?>admin/assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/><style>td.disabled.day {
    color: #e7888c!important; 
    }
    td.today.disabled {
    color: #000!important; 
    }
    html, body {
    max-width: 100%;
    overflow-x: hidden;
    }</style><?php app(\Juzaweb\Contracts\EventyContract::class)->action('theme.header'); ?> <?php echo $__env->yieldContent('header'); ?></head><body class="<?php echo e(isset($post) ? 'single-post': ''); ?> <?php echo e(body_class()); ?>"> <?php app(\Juzaweb\Contracts\EventyContract::class)->action('theme.after_body'); ?> <?php echo $__env->make('theme::header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo $__env->yieldContent('content'); ?> <?php echo $__env->make('theme::footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <script src="<?php echo e(asset('/')); ?>jw-styles/themes/myshoots/assets/vendor/jquery/jquery.min.js"></script><script src="<?php echo e(asset('/')); ?>jw-styles/themes/myshoots/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script><script src="<?php echo e(asset('/')); ?>jw-styles/themes/myshoots/assets/vendor/js/lightbox-plus-jquery.min.js"></script><script type="text/javascript" src="https:/cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/><style>.datepicker-inline{
       width: 100%;
    }
    .datepicker table {
    margin: 0;
    
    width: 100%;
}</style><script>$(document).ready(function(){var date_input=$('#bookingdate');var container=$('.bootstrap-iso form').length>0?$('.bootstrap-iso form').parent():"body";var options={format:"dd-mm-yyyy",inline:true,sideBySide:true,container:container,todayHighlight:true,daysOfWeekDisabled:[4,5,6],datesDisabled:[""],autoclose:true,startDate:new Date(2021,07,01),endDate:new Date(2021,12,01),icons:{time:"fa fa-clock-o",date:"fa fa-calendar",up:"fa fa-arrow-up",down:"fa fa-arrow-down"},};date_input.datepicker(options).on('changeDate',showTestDate);function showTestDate(){var value=$('#bookingdate').datepicker('getFormattedDate');$("#date").val(value);}})
function truncateDate(date){return new Date(date.getFullYear(),date.getMonth(),date.getDate());}
$(document).ready(function(){$('#booknow').click(function(){var date=$("#date").val();if(date!=""){window.location.href="index82e1.html?page=personal-information&amp;id=16&amp;date="+date;}else{alert("Please select date!");return false;}});})</script><script src="<?php echo e(asset('/')); ?>assets/vendor/js/jquery.payform.min.js"></script><script src="<?php echo e(asset('/')); ?>assets/vendor/js/script.js"></script><script src="<?php echo e(asset('/')); ?>assets/vendor/owlcarousel/owl.carousel.js"></script><script>$(document).ready(function(){$('.instagram-carousel').owlCarousel({loop:true,autoplay:true,margin:10,nav:false,dots:false,responsiveClass:true,responsive:{0:{items:2},600:{items:4},1000:{items:6}}})})</script><script>var elements=document.getElementsByClassName("column");var i;function one(){for(i=0;i<elements.length;i++){elements[i].style.msFlex="100%";elements[i].style.flex="100%";}}
function two(){for(i=0;i<elements.length;i++){elements[i].style.msFlex="50%";elements[i].style.flex="50%";}}
function four(){for(i=0;i<elements.length;i++){elements[i].style.msFlex="25%";elements[i].style.flex="25%";}}</script><script src="<?php echo e(asset('/')); ?>admin/assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script><script src="<?php echo e(asset('/')); ?>admin/assets/style/dist/js/dataTables-data.js"></script><script>$(document).ready(function(){$('#book-btn').click(function(){var searchquery=$("input#bookingid").val();var dataString='searchquery='+searchquery;if(searchquery!=''){$('#bars1').show();$.ajax({type:'POST',url:'pages/getBookingDetailsAjax.php',data:dataString,success:function(html){setTimeout(()=>{$('#bars1').hide();$('#bookingDataDiv').html(html);$('#datable_1').DataTable({"bFilter":true,"bLengthChange":false,"bPaginate":true,"bInfo":false,});},1000);}});}else{alert("Please enter reservation number!");return false;}});$("#booking_time").change(function(){var date=$("#booking_date").val();var time=this.value;var dataString='time='+time+'&date='+date;$.ajax({type:'POST',url:'pages/checkBookingDateTimeAjax.php',data:dataString,success:function(result){if(result==1){$('#continue_to_payment').prop('disabled',true);$('#booking_time').prop('selectedIndex',0);alert("Please select other time!");}else{$('#continue_to_payment').prop('disabled',false);}}});function fetchdata(){$.ajax({type:'POST',url:'pages/sessionOutAjax.php',data:dataString,success:function(result){if(result==1){alert("Session Out!!!");window.location.href='index0265.html?page=reservations&amp;id=16';}}});}
setInterval(fetchdata,900000);});});$("#contactForm").submit(function(event){event.preventDefault();submitForm();});function submitForm(){var name=$("#name").val();var email=$("#email").val();var phone=$("#phone").val();var subject=$("#subject").val();var message=$("#message").val();$('#bars1').show();$.ajax({type:"POST",url:"pages/contactFormAjax.php",data:"name="+name+"&email="+email+"&phone="+phone+"&subject="+subject+"&message="+message,success:function(text){if(text=="success"){formSuccess();setTimeout(()=>{$('#bars1').hide();formSuccess();},1000);}}});}
function formSuccess(){$("#msgSubmit").removeClass("hidden");}</script><?php echo $__env->yieldContent('footer'); ?> <?php app(\Juzaweb\Contracts\EventyContract::class)->action('theme.footer'); ?></body></html><?php /**PATH C:\wamp64\www\github\CreatePhoto\themes/myshoots/views/layout/app.blade.php ENDPATH**/ ?>