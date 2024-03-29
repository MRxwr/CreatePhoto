<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }}</title>
    <link rel="icon" href="{{ asset('jw-styles/juzaweb/styles/images/favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/css?family=Mukta:400,700,800&display=swap" rel="stylesheet" />
<!-- Latest compiled and minified CSS -->

    @include('juzaweb::components.juzaweb_langs')

    @do_action('juzaweb_header')

    @yield('header')
    <style>
        #form-search {
             float: right;
        }
    </style>
</head>

<body class="juzaweb__menuLeft--dark juzaweb__topbar--fixed juzaweb__menuLeft--unfixed">
<div class="juzaweb__layout juzaweb__layout--hasSider">

    <div class="juzaweb__menuLeft">
        <div class="juzaweb__menuLeft__mobileTrigger"><span></span></div>

        <div class="juzaweb__menuLeft__outer">
            <div class="juzaweb__menuLeft__logo__container">
                <!-- <div class="juzaweb__menuLeft__logo">
                    <div class="juzaweb__menuLeft__logo__name">
                        <a href="/{{ config('juzaweb.admin_prefix') }}">
                            <img src="{{ asset('jw-styles/juzaweb/styles/images/logo.png') }}" alt="">
                        </a>
                    </div>
                </div> -->
                <a href="/{{ config('juzaweb.admin_prefix') }}">
                <div class="juzaweb__menuLeft__logo">
                    <img src="{{ asset('jw-styles/juzaweb/styles/images/logo.svg') }}" class="mr-2" alt="Create KW">
                    <div class="juzaweb__menuLeft__logo__name">CreatePhoto</div>
                    <!-- <div class="juzaweb__menuLeft__logo__descr">Photo</div> -->
                </div>

                </a>
                
            </div>

            <div class="juzaweb__menuLeft__scroll jw__customScroll">
                @include('juzaweb::backend.menu_left')
            </div>
        </div>
    </div>
    <div class="juzaweb__menuLeft__backdrop"></div>

    <div class="juzaweb__layout">
        <div class="juzaweb__layout__header">
            @include('juzaweb::backend.menu_top')
        </div>

        <div class="juzaweb__layout__content">
            @if(!request()->is(config('juzaweb.admin_prefix')))
                {{ jw_breadcrumb('admin', [
                        [
                            'title' => $title
                        ]
                    ]) }}
            @else
                <div class="mb-3"></div>
            @endif

            <h4 class="font-weight-bold ml-3 text-capitalize">{{ $title }}</h4>

            <div class="juzaweb__utils__content">

                @do_action('backend_message')

                @php
                $data = get_backend_message();
                @endphp
                @foreach($data as $messages)
                    <!-- @foreach($messages as $message)
                    <div class="alert alert-{{ $message['status'] == 'error' ? 'danger' : $message['status'] }} jw-message">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {!! e_html($message['message']) !!}
                    </div>
                    @endforeach -->
                @endforeach

                @if(session()->has('message'))
                    <div class="alert alert-{{ session()->get('status') == 'success' ? 'success' : 'danger' }} jw-message">{{ session()->get('message') }}</div>
                @endif

                @yield('content')
            </div>
        </div>

        <div class="juzaweb__layout__footer">
            <div class="juzaweb__footer">
                <div class="juzaweb__footer__inner">
                    <a href="https://create-kw.com" target="_blank" rel="noopener noreferrer" class="juzaweb__footer__logo">
                        CreatePhoto ({{ \Juzaweb\Version::getVersion() }}) - The Best for Photography CMS
                        <span></span>
                    </a>
                    <br />
                    <p class="mb-0">
                        Copyright © {{ date('Y') }} {{ get_config('sitename') }} - Provided by Create-KW
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Latest compiled JavaScript -->

<script type="text/javascript">
    $.extend( $.validator.messages, {
        required: "{{ trans('juzaweb::app.this_field_is_required') }}",
    });

    $(".form-ajax").validate();
</script>

@do_action('juzaweb_footer')

@yield('footer')
</body>
</html>