@extends('layouts.app')

@section('content')

<p>hi</p>
<!---
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">

                      <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="/avatar/{{$user->avatar}}" style="width:75px; height:75px;  border-radius:50%; margin-right:25px;">
                              </div>
                                <div class="col-sm-9">
                                  <h2>{{ $user->name }}'s Profile</h2>
                                    <label>Update Profile Image</label>
                                    <input type="file" name="avatar">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  </div>
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

                              </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">

                              <a href="{{ route(profile.edit) }}" class="col-xs-4 pull-left btn btn-sm btn-primary">Edit</a>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
