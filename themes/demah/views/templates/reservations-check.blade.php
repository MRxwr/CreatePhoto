@extends('juzaweb::layouts.frontend')

@section('content')
 <!-- reservation-details -->
 <section class="reservation-details py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="row">
                            <div class="col-xl-12 pb-5">
                                <div class="site-title position-relative d-flex align-items-center">
                                    <div class="bg-white">
                                        <h3 class="fs30 text-300 SegoeUIL pe-4">
                                            Reservation details
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center pb-5 mb-3">
                    <div class="col-xl-11 mb-4">
                        <h4 class="fs23 mb-3">
                            Please enter you reservation number to view you reservation details
                        </h4>
                        <div class="personal-form">
                            <div class="d-flex align-items-center">
                                <input type="text" class="border w-260 radius5" id="bookingid">
                                <button class="border-0 bg-none ms-1"  id="book-btn">
                                    <img src="{{asset('/')}}jw-styles/themes/cstudio/assets/img/submit.svg" alt="img">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-11">
                        <div class="package-head bg-info radius15 mh53 py-1 px-3 d-inline-flex align-items-center">
                            <h4 class="fs20 text-info">
                                You can find the reservation number in the SMS sent by us.
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xxl-8">
                    <div id="bookingDataDiv"></div>
                        <!-- reservation-item -->
                       
                        <!-- reservation-item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- reservation-details -->

@endsection
