@extends('juzaweb::layouts.frontend')

@section('content')
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
                                            Personal Informations
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
            <form class="personal-information" method="post" action="{{url('payment')}}">
                {!! csrf_field() !!}
            
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <!-- package-item -->
                        <div class="px-xxl-5">
                            <div class="row package-item">
                            @apply_filters('theme.reservation.data')

                            @apply_filters('cstudio.reservation.time')
           
                            @apply_filters('cstudio.reservation.services')
                                <div class="col-sm-12 pe-xl-5 pt-4">
                                    <div class="package-head bg-light radius15 mh53 py-1 px-3 mb-4 d-inline-flex align-items-center">
                                        <h4 class="fs23">
                                          @lang('theme::app.informations'):
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-xxl-8 pe-xl-5 pt-4">
                                    <div class="personal-form row">
                                        <div class="col-xxl-6 pb-3">
                                            <label>
                                               @lang('sbph::app.customer_name'): 
                                            </label>
                                            <input type="text" class="border" id="customer_name" name="customer_name" required >
                                        </div>
                                        <input type="hidden" class="form-control form-control-lg" id="customer_email" name="customer_email" value="hello@myshootskw.com" required>
                                        <div class="col-xxl-6 pb-3">
                                            <label>
                                            @lang('sbph::app.baby_name'):
                                            </label>
                                            <input type="text" class="border" id="baby_name" name="baby_name">
                                        </div>
                                        <div class="col-xxl-6 pb-3">
                                            <label>
                                              @lang('sbph::app.mobile_number'):
                                            </label>
                                            <input type="text" class="border" id="mobile_number" name="mobile_number" required>
                                        </div>
                                        <div class="col-xxl-6 pb-3">
                                            <label>
                                            @lang('sbph::app.baby_age'):
                                            </label>
                                            <input type="text" class="border"  id="baby_age" name="baby_age">
                                        </div>
                                        <div class="col-xxl-12 py-3">
                                            <label class="opacity0">
                                                @lang('sbph::app.instructions'):
                                            </label>
                                            <textarea class="border" rows="6" placeholder="Instructions" name="instructions" id="instructions"></textarea>
                                        </div>
                                        @apply_filters('theme.reservation.fields')
                                        @do_action('theme.coupon.fields') 
                                    </div>
                                </div>
                                <div class="col-sm-12 pe-xl-5 pt-4">
                                    <div style="width:220px;"  class="package-head bg-success radius15 mh67 py-1 px-3 mb-4   align-items-center"> 
                                       <h4 id="totalprice" class="fs23 text-success" style="padding: 20px;"></h4>
                                    </div>
                                    <div class="package-head bg-danger radius15 mh67 py-1 px-3 mb-4 d-inline-flex align-items-center">
                                        <h4 class="fs23 text-danger">
                                            Deposit: <span class="text-600">30.500 KD</span> Please note that the deposit is non refundable
                                            
                                        </h4>
                                        
                                        <p class="theme-color pl-2">
                                          0.500 is the payment gateway transaction fees.
                                        </p>
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
                                     
                                      <a href="#" class="btn btn-lg btn-light fs32 radius30" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                         @lang('theme::app.continue_to_payment')
                                      </a>

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
                                                          <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/popup_close.svg" alt="img">
                                                      </button>
                                                  </div>
                                                  <div class="modal-body px-sm-5">
                                                      <ul class="terms-list fs24">
                                                          <li>
                                                              - Filming dates are confirmed by paying a 30-dinar deposit, and the deposit is not refunded if the appointment is canceled.
                                                          </li>
                                                          <li>
                                                              - When booking make sure you choose the theme that you want as to arrange for you session.
                                                              The duration of the photo session is 30 minutes and 15 minutes. Choose photos.
                                                          </li>
                                                          <li>
                                                              - In the event that we want to postpone the appointment, we are notified two days in advance, and another appointment will be determined according to the available dates.
                                                          </li>
                                                          <li>
                                                              - The appointment is only postponed once.
                                                          </li>
                                                          <li>
                                                              - Payment is made immediately after the filming session, and there is a Knet service.
                                                          </li>
                                                          <li>
                                                              - Studio in Khalidiya area.
                                                          </li>
                                                          <li>
                                                              - In the event that a quarter of an hour is late for the appointment, the appointment will be canceled and the deposit will not be returned.
                                                          </li>
                                                          <li>
                                                              - The maximum number we receive is 2 to 3 people.
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  <div class="modal-footer d-flex align-items-center justify-content-center mb-3">
                                                    <button type="submit"  name="submit"  class="btn btn-md btn-light fs25 radius30" > Procced to payment</button>
                                                  </div>
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
            </form>
            </div>
        </section>
        <!-- Personal Informations -->
@endsection
@section('footer')
     <script>
        $(".open_time").on('click', function(event){
            $( ".open_time" ).removeClass("active");
            $(this).addClass("active");
            $('#booking_time').val(this.id);
            //alert(this.id);
        });
    </script>
@endsection