@extends('layouts.app')

@section('content')
    <h1>Edit user</h1>
    {!! Form::open(['action' => ['ProfileController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'name'])}}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $user->email, ['class' => "form-control . $errors->has('email') ? ' has-error' : ''", 'placeholder' => 'email'])}}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>
        <div class="form-group">
            {{Form::label('bio', 'Bio')}}
            {{Form::textarea('bio', $user->bio, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'bio Text'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
