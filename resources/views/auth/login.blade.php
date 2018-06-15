@extends('layouts.app')

@section('title')
    Login
@endsection

@section('head-plus')
    <link rel="stylesheet" href={{ asset('css/signup-login-form.css') }}>
@endsection

@section('content')
    <div id="top-container-wrapper">
        <div id="top-form-wrapper" class="container text-uppercase">
            <div id="top-title" class="text-center">
                <h1>LOGIN</h1>
            </div>

            <div id="top-form" class="col-xs-12 col-md-10 col-md-offset-1">
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group col-xs-12">
                        {!! Form::label('email', 'EMAIL') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'email@example.com']) !!}
                    </div>

                    <div class="form-group col-xs-12">
                        {!! Form::label('password', 'PASSWORD') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div id="submit" class="form-group col-xs-12">
                        {!! Form::submit('LOGIN', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}

                <p class="col-xs-12">NOT A MEMBER YET? {!! link_to_route('signup.get', 'SIGNUP') !!}</p>
            </div>
        </div>
    </div>
@endsection