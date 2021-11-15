<div class="mymo-item">
    @php
        $genres = $post->getTaxonomies('genres');
        $countries = $post->getTaxonomies('countries');

        $genre_str = '';
        foreach ($genres as $genre) {
            $genre_str .= '<span class=category-name>'. $genre->name .'</span>';
        }

        $country_str = '';
        foreach ($countries as $country) {
            $country_str .= '<span class=category-name>'. $country->name .'</span>';
        }
    @endphp
    
    <a class="mymo-thumb" href="{{ $post->getLink() }}" title="{{ $post->getTitle() }}{{ $post->origin_title ? ' - ' . $post->origin_title : '' }}">
        <figure>
            <img class="lazyload blur-up img-responsive" data-sizes="auto" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ $post->getThumbnail() }}" alt="{{ $post->getTitle() }}{{ $post->origin_title ? ' - ' . $post->origin_title : '' }}" title="{{ $post->getTitle() }}{{ $post->origin_title ? ' - ' . $post->origin_title : '' }}">
        </figure>
        <span class="status">{{ $post->video_quality }}</span>
        @if($post->tv_series == 0)
            <span class="episode">Full</span>
        @else
            <span class="episode">@lang('theme::app.episode') {{ $post->current_episode }}{{ $post->max_episode ? '/' . $post->max_episode : '' }}</span>
        @endif
        <div class="icon_overlay" data-html="true"
             data-toggle="mymo-popover"
             data-placement="top"
             data-trigger="hover"
             title="<span class=film-title>{{ $post->getTitle() }}</span>"
             data-content="<div class=org-title>{{ $post->origin_title }} ({{ $post->year }})</div>                            <div class=film-meta>

                            <div class=film-content>{{ $post->getDescription() }}</div>
                            <p class=category>@lang('theme::app.countries'): {{ $country_str }}</p>                                <p class=category>@lang('theme::app.genres'): {{ $genre_str }}</p>
                        </div>">
        </div>

        <div class="mymo-post-title-box">
            <div class="mymo-post-title ">
                <h2 class="entry-title">{{ $post->getTitle() }}</h2>
                <p class="original_title">{{ $post->origin_title }} ({{ $post->year }})</p>
            </div>
        </div>
    </a>
</div>