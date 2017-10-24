@extends('layouts.app')

@section('content')
    <h3>Your search for "{{ Request::input('query') }}"</h3>

    @if (!$user->count() && !$post->count())
        <p>No results found, sorry.</p>
    @else
        <div class="row">
            <div class="col-lg-12">
                @foreach ($user as $users)
                    @include('user/partials/userblock')
                @endforeach
                @foreach ($post as $posts)
                    @include('posts/partials/postblock')
                @endforeach
            </div>
        </div>
    @endif
@stop