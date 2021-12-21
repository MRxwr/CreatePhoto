@extends('juzaweb::layouts.frontend')

@section('content')
    @php
        $genres = $post->getTaxonomies('genres');
        $countries = $post->getTaxonomies('countries');
        $tags = $post->getTaxonomies('tags');
        $genre = $genres[0] ?? null;
        $star = 0;
        $player_id = 0;
        $servers = $post->servers()->whereEnabled()->get();
        $relatedMovies = $post->getRelatedPosts(8);
        $star = $post->getStarRating();
    @endphp

    @if(request()->query('video'))
        @php
        $is_watch = true;
        $player_id = request()->query('video');
        @endphp
        @include('theme::watch.watch')
    @else
        @include('theme::watch.index')
    @endif
@endsection
