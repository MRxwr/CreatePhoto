@extends('juzaweb::layouts.frontend')

@section('content')
<section>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="shoots-Head2">Personal Information</h2>
        </div>
        <div class="col-md-8 col-sm-10">
          <form class="personal-information" method="post" action="{{url('payment')}}">
            {!! csrf_field() !!}
            @apply_filters('theme.reservation.data')
            
            @apply_filters('theme.reservation.time')
           
            @apply_filters('theme.reservation.services')

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
            @apply_filters('theme.reservation.fields');
            <div class="form-group row">
              <label for="" class="col-sm-5 col-md-4 col-form-label"></label>
              <div class="col-sm-12 col-md-8">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="termsandcondition" required>
                    <label class="form-check-label" for="defaultCheck1">
                      <span class="form-control-plaintext"> I agree with the <a href="index551d.html?page=terms-and-condition" targer="_blank">Terms and Condition</a> </span>
                    </label>
                  </div>
				  
              <div class="reservation">
              <h5 class="theme-color mt-4">
                <span>Deposit:</span> <span>30.500 KD</span>
              </h5>
              <p class="theme-color mb-1 pl-2">
                Deposit are not refundable.
              </p>
              <p class="theme-color pl-2">
                0.500 is the payment gateway transaction fees.
              </p>
            </div> 
              </div>
            </div>
			
			      <div class="row pt-4">
              <div class="col-sm-5 col-md-4">&nbsp;</div>
              <div class="col-sm-7 col-md-8">
                <button type="submit"  name="submit"  class="btn btn-lg btn-outline-primary btn-block btn-rounded">Continue to payment</button>
              </div>  
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
