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
                                            {{ $post->getTitle() }}
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
                            <div class="col-xl-6 pb-5 SegoeUIL"> 
                                {!! $post->getContent() !!} 
                                 <div  class="w-100 text-center">
                                     <a class="btn btn-sm btn-light mh63 fs25 radius15 w-50" href="https://goo.gl/maps/SvNGMQmaquh4Qu79A">{{ $post->getTitle() }} </a>
                                </div>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">
                                <div class="map-location">
                                <img src="{{ $post->getThumbnail() }}" alt="{{ $post->getTitle() }}" class="w-100 mt-xl-0 mt-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-details -->

@endsection
