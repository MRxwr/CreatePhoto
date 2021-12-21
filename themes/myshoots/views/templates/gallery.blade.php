@extends('juzaweb::layouts.frontend')

@section('content')
<section>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
            <!-- <button class="btn btn-sm theme-bg text-uppercase text-white" onclick="one()">Single Grid</button> -->
            <button class="btn btn-sm theme-bg text-uppercase text-white" onclick="two()">Double Grid</button>
            <button class="btn btn-sm theme-bg text-uppercase text-white active" onclick="four()">4 Grids</button>
        </div>
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="mt-3 gallery-grid">          
            <div class="column">        
            <a class="example-image-link" img-id="gm-0" href="uploads/images/733083-2CB0C1B0-130B-49A6-93CE-D64EDC982D7C.jpg" data-lightbox="example-set" data-title="">
              <img src="uploads/images/733083-2CB0C1B0-130B-49A6-93CE-D64EDC982D7C.jpg" style="width:100%">
           </a>
           </div>
           <div class="column"></div>
           <div class="column"></div>
           <div class="column"></div>
          </div>
        </div>   
      </div>
    </div>  
  </section>
@endsection
