@extends('juzaweb::layouts.frontend')
@section('header')

@endsection
@section('content')
  @include('theme::homepage.'.get_theme_config('home'))
@endsection
