@extends('layouts.app')

@section('content')
<h1>{{$user->avatar}}</h1>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3 text-center">
                              <img src="/storage/avatar/{{$user->avatar}}" style="width:100px; height:100px;  border-radius:50%; ">
                              </div>
                                <div class="col-sm-9">
                                  <h2>{{ $user->name }}'s Profile</h2>
                                  @if(!Auth::guest())
                                      @if(Auth::user()->id == $user->id)
                                          {!! Form::open(['action' => ['ProfileController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                          {{ csrf_field() }}
                                            {{Form::label('file', 'New Profile Image', [ 'class' => 'btn btn-default btn-sm' ])}}
                                            {{Form::file('avatar', ['id' => 'file', 'class' => 'hidden'])}}
                                            <p>Resizes to (200 x 200 pixel)</p>
                                            {{Form::submit('Update', ['class'=>'btn btn-primary btn-sm pull-right'])}}
                                         
                                            {{Form::hidden('_method','PATCH')}}
                                          {!! Form::close() !!}

                                            {!! Form::open(['action' => ['UpdateUserImage@imgReset', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                {{ csrf_field() }}
                                                {{Form::file('avatar', ['id' => 'file', 'class' => 'hidden'])}}
                                                {{Form::submit('Reset', ['class'=>'btn btn-default btn-sm pull-right'])}}
                                                {{Form::hidden('_method','POST')}}
                                            {!! Form::close() !!}
                                        @endif
                                      @endif
                                  </div>
                            </div>
                            <hr>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label text-right">Name:</label>
                            <div class="col-sm-9">
                                <p>{{ $user->name }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label text-right">E-Mail Address:</label>

                            <div class="col-sm-9">
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="text" class="col-sm-3 control-label text-right">BIO:</label>
                              <div class="col-sm-9">
                                <p>{{ $user->bio }}</p>
                              </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">

                              @if(!Auth::guest())
                                  @if(Auth::user()->id == $user->id)
                                      <a href="/user/{{$user->id}}/edit" class="btn btn-default">Edit</a>

                                      <!-- Trigger the modal with a button -->
                                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete profile</button>

                                      <!-- Modal -->
                                      <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h2 class="modal-title">Warning</h2>
                                            </div>
                                            <div class="modal-body">
                                              <p>Are you sure you want to delete your profile?</p>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                                                {!!Form::open(['action' => ['ProfileController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                  {{Form::hidden('_method', 'DELETE')}}
                                                  {{Form::submit('Delete evryting', ['class' => 'btn btn-danger'])}}
                                                {!!Form::close()!!}
                                                @endif
                                             @endif
                                            </div>
                                        </div>
                                    </div>      
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
