@extends('juzaweb::layouts.frontend')

@section('content')
<section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="shoots-Head">Contact</h2>
        </div>
        <div class="col-lg-6">
          <ul class="list-unstyled contact-details">
            <li class="mb-3"><a href="#" class="theme-color h5"><i class="fas fa-map-marker-alt mr-2"></i> Kuwait City</a></li>
            <li class="mb-3"><a href="#" class="theme-color h5"><i class="far fa-envelope mr-1"></i> Hello@myshoots.com</a></li>
          </ul>
        </div>
        <div class="col-lg-6 col-xl-5">
          <form class="contact-form" id="contactForm">
            <div class="form-group row">
              <div class="col-md-6 mb-3"><input type="text" class="form-control form-control-lg" placeholder="Name" required="" name="name" id="name"></div>
              <div class="col-md-6 mb-3"><input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email" required=""></div>
            </div>
            <div class="form-group row">
              <div class="col-md-6 mb-3"><input type="text" name="phone" id="phone" class="form-control form-control-lg" placeholder="Phone" required=""></div>
              <div class="col-md-6 mb-3"><input type="text" name="subject" id="subject" class="form-control form-control-lg" placeholder="Subject" required=""></div>
            </div>
            <div class="form-group row">
              <div class="col-md-12"><textarea class="form-control form-control-lg" id="message" name="message" rows="3" placeholder="Your Message Here.."></textarea></div>
            </div>
            <div><button type="submit" class="btn btn-lg btn-outline-primary btn-block btn-rounded">Submit</button></div>
            <div id="bars1" style="display:none">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
             </div>
            <div id="msgSubmit" class="alert alert-success text-center mt-4 d-none">Message Submitted!</div>
          </form>
          <div style="margin-top: 10px;color: red;">*
          To serve you better, please note that the message is only for inquiries and not for making reservations. Thank you.        </div>
        </div>
      </div>
    </div>
  </section>
@endsection
