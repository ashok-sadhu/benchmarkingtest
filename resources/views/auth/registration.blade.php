@extends('layouts.app', ['pageSlug' => 'register', 'class' => 'login-page', 'page' => __('Login Page'), 'contentClass' => 'login-page'])

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-3"></div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-center h-100">
                        <div class="card">
                            <div class="card-header">
                                <h3>Registration Info</h3>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'register.custom', 'files' => true, 'class' => 'login-form', 'id' => 'parsely-frm']) !!}
                                    <div class="form-group">
                                        {{ Form::label('Name', null, ['class' => 'control-label']) }}
                                        {!! Form::text('name', old('name'), ['data-required' => 'true','class' => 'form-control', 'placeholder' => 'Name']) !!}
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Email', null, ['class' => 'control-label']) }}
                                        {!! Form::text('email', old('name'),['data-required' => 'true','class' => 'form-control', 'placeholder' => 'Email']) !!}
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Password', null, ['class' => 'control-label']) }}
                                        {!! Form::password('password',['data-required' => 'true','class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Password']) !!}
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Confirm Password', null, ['class' => 'control-label']) }}
                                        {!! Form::password('confirm_password',['data-required' => 'true','class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Confirm Password']) !!}
                                        @if ($errors->has('confirm_password'))
                                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::submit('Submit',['data-required' => 'true','class' => 'form-control btn btn-success']) !!}
                                        <!-- <input type="submit" value="Login" class="btn float-right login_btn"> -->
                                    </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-center links">
                                    <a class="btn btn-primary" href="{{ url('/login') }}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection