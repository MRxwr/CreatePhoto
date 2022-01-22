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
          @apply_filters('theme.galleries');
        </div>   
      </div>
    </div>  
  </section>
@endsection
