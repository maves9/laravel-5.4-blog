<div class="media">
    <a class="pull-left" href="{{ route('welcome', ['post' => $posts->title]) }}">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="/posts/{{ $posts->id }}">{{ $posts->title }}</a> (Post)</h4>

    </div>
</div>