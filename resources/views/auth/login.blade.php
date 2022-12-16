@extends('layouts.app', ['pageSlug' => 'login', 'class' => 'login-page', 'page' => __('Login Page'), 'contentClass' => 'login-page'])

@section('content')
<style type="text/css">
.remember{ 
    color: white;
}
.remember input {
    width: 20px;
    height: 20px;
    margin-left: 15px;
    margin-right: 5px;
}
.login_btn{
    color: black;
    background-color: #FFC312;
    width: 100px;
}
.login_btn:hover{
    color: black;
    background-color: white;
}
</style>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-5">
                <div class="d-flex justify-content-center h-100">
                    <div class="card">
                        <div class="card-header">
                            <h3>Sign In</h3>
                        </div>
                        @if ($alert = Session::get('alert-error'))
                            <div class="alert alert-warning">
                                {{ $alert }}
                            </div>
                        @endif
                        <div class="card-body">
                            {!! Form::open(['route' => 'login.custom', 'files' => true, 'class' => 'login-form', 'id' => 'parsely-frm']) !!}
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    {!! Form::text('email',null,['data-required' => 'true','class' => 'form-control', 'placeholder' => 'Email', 'data-type' => 'email']) !!}
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    {!! Form::password('password',['data-required' => 'true','class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Password']) !!}
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif

                        </div>
                        <div class="card-footer">
                            <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">{{ __('Login') }}</button>
                            {!! Form::close() !!}
                            <div class="pull-left">
                                <h6>
                                    <a href="{{ url('/registration') }}" class="link footer-link">{{ __('Create Account') }}</a>
                                </h6>
                            </div>
                            <div class="pull-right">
                                <h6>
                                    <a href="#" class="link footer-link">{{ __('Forgot password?') }}</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection