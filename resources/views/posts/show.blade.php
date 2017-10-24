@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    @if($post->cover_image !== 'noimage')
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    @endif
    <br><br>

    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{ csrf_field() }}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif

    <h3 class="text-center">Comments</h3>
    <div class="row">
      @if(!Auth::guest())
          @if(Auth::user()->id == true)
          <div class="col-sm-8 col-sm-offset-2">

            <div class="col-sm-2">
              <img src="/storage/avatar/default.jpg" style="width:75px; height:75px;  border-radius:50%; ">
            </div>

              <div class="form-group col-sm-10 center-block">
                {{ Form::open(['method' => 'POST', 'route' => ['posts.reply', $post]]) }}
                {{ csrf_field() }}
                  {{Form::label('comment', Auth::user()->name)}}
                  {{Form::textarea("comment", null, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Add comment', ])}}
                  {{Form::submit('Send', ['class' => 'btn btn-primary pull-right'])}}        
                {{Form::close()}}
              </div>

          </div>
        </div>
      @endif
    @endif

  @if(Auth::guest())
  <p class="text-center">Please login to comment</p>
    @endif


  @if(count($post->post_reply > 0))
       @foreach ($post_replies->reverse() as $post_reply)
       
          <div class="col-sm-8 col-sm-offset-2">
            <hr>
            <div class="col-sm-2">
              <img src="/storage/avatar/default.jpg" style="width:75px; height:75px;  border-radius:50%;">
            </div>

            <div class="form-group col-sm-10 center-block">
                <strong>{{$post_reply->name}}</strong>
                <p>{{$post_reply->comment}}</p>
            </div>

          </div>
         <br><br><br><br>
        @endforeach
      
  @else
      <p>No comments</p>
  @endif
  </div>
@endsection
