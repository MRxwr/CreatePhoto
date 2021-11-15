@extends('juzaweb::layouts.frontend')

@section('content')
    <div class="container">
        <div class="row container" id="wrapper">
            <div class="mymo-panel-filter">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-8 hidden-xs">
                            {{ get_config('title') }}
                        </div>
                        <div class="col-xs-4 text-right">
                            <a href="javascript:;" id="expand-ajax-filter">@lang('theme::app.filter_movies') <i id="ajax-filter-icon" class="hl-angle-down"></i></a>
                        </div>
                        <div id="alphabet-filter" style="float: right;display: inline-block;margin-right: 25px;"></div>
                    </div>
                </div>
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                    <div class="ajax"></div>
                </div>
            </div><!-- end panel-default -->

            @php
                $ads = mymo_get_ads('home_header');
            @endphp

            @if($ads)
                <div class="col-xs-12">
                    <!-- Ads -->
                    {!! $ads !!}
                </div>
            @endif


            <div class="col-xs-12 carausel-sliderWidget">
                {{-- slider movie --}}
                {{ dynamic_sidebar('home') }}

                {{-- genre list --}}
            </div>

        </div>
    </div>
@endsection
