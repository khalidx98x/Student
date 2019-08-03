@extends('student.layout.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/student/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">first name</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name') }}" autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('second_name') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">second name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="second_name"
                                           value="{{ old('second_name') }}" autofocus>

                                    @if ($errors->has('second_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('second_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('third_name') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">third name</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="third_name"
                                           value="{{ old('third_name') }}" autofocus>

                                    @if ($errors->has('third_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('third_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('fourth_name') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">fourth name</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="fourth_name"
                                           value="{{ old('fourth_name') }}" autofocus>

                                    @if ($errors->has('fourth_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('fourth_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('high_school_gpa') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">high school gpa</label>

                                <div class="col-md-6">
                                    <input  type="text" class="form-control" name="high_school_gpa"
                                           value="{{ old('high_school_gpa') }}" autofocus>

                                    @if ($errors->has('high_school_gpa'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('high_school_gpa') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input  type="email" class="form-control" name="email"
                                           value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input  type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label  class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input  type="password" class="form-control"
                                           name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
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
