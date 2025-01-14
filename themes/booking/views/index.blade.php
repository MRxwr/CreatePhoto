@extends('juzaweb::layouts.frontend')

@section('content')
    <div class="row m-0 w-100">
        <div class="col-md-12">
          <h3 class="fs30 text-600 SegoeUISB text-uppercase SegoeUIL px-5">
            @lang('theme::app.our_packages')
          </h3>
        </div>
        <div class="col-md-12">
           @do_action('theme.homepackages')
        </div>
    </div>

             
@endsection
