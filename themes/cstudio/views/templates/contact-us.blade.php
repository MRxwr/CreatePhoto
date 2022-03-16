@extends('juzaweb::layouts.frontend')

@section('content')
 <!-- contact-details -->
 <section class="contact-details py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <div class="row">
                            <div class="col-xl-12 pb-5">
                                <div class="site-title position-relative d-flex align-items-center">
                                    <div class="bg-white">
                                        <h3 class="fs30 text-300 SegoeUIL pe-4">
                                            Contact Us
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pb-5 mb-5">
                <div class="row justify-content-center">
                    <div class="col-xxl-11">
                        <div class="row">
                            <div class="col-xl-5 pb-4">
                                <h4 class="fs23 pb-4">
                                    Any Questions you can reach us from here!
                                </h4>
                                <div class="form-group row fs20">
                                    <div class="col-sm-6 pb-4">
                                        <input type="text" class="form-control mh63" placeholder="Name" name="name" id="name">
                                    </div>
                                    <div class="col-sm-6 pb-4">
                                        <input type="text" class="form-control mh63" placeholder="Email" name="email" id="email">
                                    </div>
                                    <div class="col-sm-6 pb-4">
                                        <input type="text" class="form-control mh63" placeholder="Phone" name="phone" id="phone">
                                    </div>
                                    <div class="col-sm-6 pb-4">
                                        <input type="text" class="form-control mh63" placeholder="Subject" name="subject" id="subject">
                                    </div>
                                    <div class="col-sm-12 pb-4">
                                        <textarea rows="2" class="form-control mh63" placeholder="Your message here..." id="message" name="message"></textarea>
                                    </div>
                                    <div class="col-sm-12 pb-4">
                                        <button class="btn btn-sm btn-light mh63 fs25 radius15 w-100" id="msgSubmit">
                                            Submit
                                        </button>
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <div class="bg-info radius15 mh53 py-2 px-3 d-inline-flex align-items-center">
                                            <h4 class="fs19 text-info">
                                                To serve you better, please note that the message is only for inquiries and not for making reservations. Thank you.
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 offset-xl-2 d-flex justify-content-end">
                                <div class="map-location">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27814.41181998413!2d47.96435716367465!3d29.37610145382455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf9c83ce455983%3A0xc3ebaef5af09b90e!2sKuwait%20City%2C%20Kuwait!5e0!3m2!1sen!2sbd!4v1647186970033!5m2!1sen!2sbd" width="610" height="410" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-details -->

@endsection
