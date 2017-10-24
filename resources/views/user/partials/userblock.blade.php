<div class="media">
    <a class="pull-left" href="{{ route('welcome', ['user' => $users->name]) }}">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="/user/{{ $users->id }}">{{ $users->name }}</a> (Profile)</h4>
    </div>
</div>