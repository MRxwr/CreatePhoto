@extends('juzaweb::layouts.auth')

@section('content')
    <div class="juzaweb__layout__content">
        <div class="juzaweb__utils__content">
            <div class="juzaweb__auth__authContainer">
                <div class="juzaweb__auth__containerInner">
                    <div class="text-center mb-5">
                        <h1 class="mb-5 px-3">
                            <strong>{{ trans('juzaweb::message.login_form.welcome', ['name' => get_config('sitename', 'Create CMS')]) }}</strong>
                        </h1>
                    </div>

                    <div class="card juzaweb__auth__boxContainer">
                        <div class="text-dark font-size-24 mb-4">
                            <strong>Create your account</strong>
                        </div>

                        <div class="mb-4">
                            <p>
                                And start spending more time on your projects and less time managing your infrastructure.
                            </p>
                        </div>

                        <form action="{{ route('register') }}" method="post" class="mb-4 form-ajax">
                            @do_action('register_form')

                            <div class="form-group mb-4">
                                <input type="text" name="name" class="form-control" placeholder="@lang('juzaweb::app.full_name')" autocomplete="off"/>
                            </div>
                            <div class="form-group mb-4">
                                <input type="text" name="email" class="form-control" placeholder="@lang('juzaweb::app.email_address')" autocomplete="off"/>
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password" class="form-control" placeholder="@lang('juzaweb::app.password')" autocomplete="off"/>
                            </div>

                            <div class="form-group mb-4">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="@lang('juzaweb::app.password_confirmation')" autocomplete="off"/>
                            </div>

                            <button type="submit" class="btn btn-primary text-center w-100" data-loading-text="@lang('juzaweb::app.please_wait')">
                                <strong>Sign Up</strong>
                            </button>

                        </form>
                    </div>
                    <div class="text-center pt-2 mb-auto">
                        <span class="mr-2">Already have an account?</span>
                        <a href="{{ route('user.login') }}" class="jw__utils__link font-size-16" data-turbolinks="false">
                            Sign in
                        </a>
                    </div>
                </div>
                <div class="mt-auto pb-5 pt-5">
                    <div class="text-center">
                        Copyright © {{ date('Y') }} {{ get_config('sitename') }} - Provided by Create CMS
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
