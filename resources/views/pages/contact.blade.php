@extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Contact info</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('contact') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="subject" class="col-md-4 control-label">Subject</label>

                                <div class="col-md-6">
                                    <input name="subject" id="subject" class="form-control" type="subject" autofocus>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="form-group">
                              <label for="message" class="col-md-4 control-label">Message</label>

                                <div class="col-md-6">
                                    <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Send
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
