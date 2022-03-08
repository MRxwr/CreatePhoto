@extends('juzaweb::layouts.frontend')

@section('content')
    @php
        $cats = $post->getTaxonomies('categories', true);
    @endphp

<div class="container">
    <div class="row container" id="wrapper">
        <div class="mymo-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-8 hidden-xs">
                        <div class="yoast_breadcrumb">
                            <span>
                                <span>
                                    <a href="{{ route('home') }}">@lang('theme::app.home')</a> »

                                    @foreach($cats as $cat)
                                        <a href="{{ $cat->getLink() }}">{{ $cat->getName() }}</a> »
                                    @endforeach

                                    <span class="breadcrumb_last" aria-current="page">{{ $post->getTitle() }}</span>

                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="col-xs-4 text-right">
                        <a href="javascript:void(0)" id="expand-ajax-filter">@lang('theme::app.filter_movies') <i id="ajax-filter-icon" class="hl-angle-down"></i></a>
                    </div>

                    <div id="alphabet-filter" style="float: right;display: inline-block;margin-right: 25px;"></div>
                </div>
            </div>

            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>

        </div><!-- end panel-default -->

        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">
                    <h3 class="section-title">
                        <span>{{ $post->getTitle() }}</span>
                    </h3>
                </div>
                <div class="mymo_box">
                    {!! $post->getContent() !!}
                </div>

                <div class="comments">

                </div>
            </section>
        </main>

        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
            {!! dynamic_sidebar('sidebar') !!}
        </aside>
    </div>
</div>

@endsection