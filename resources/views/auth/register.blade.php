@extends('layouts.app')

@section('title')
    Signup
@endsection

@section('head-plus')
    <link rel="stylesheet" href={{ asset('css/signup-login-form.css') }}>
@endsection

@section('content')
    <div id="top-container-wrapper">
        <div id="top-form-wrapper" class="container text-uppercase">
            <div id="top-title" class="text-center">
                <h1>SIGNUP</h1>
            </div>

            <div id="top-form" class="col-xs-12 col-md-10 col-md-offset-1">
                {!! Form::open(['route' => 'signup.post']) !!}
                    <div class="form-group col-xs-12">
                        {!! Form::label('name', 'name') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'David Davidson']) !!}
                    </div>

                    <div class="form-group col-xs-12">
                        {!! Form::label('email', 'email') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'email@example.com']) !!}
                    </div>

                    <div class="form-group col-xs-12">
                        {!! Form::label('password', 'password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-xs-12">
                        {!! Form::label('password_confirmation', 'confirm password') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>

                    <div id="submit" class="col-xs-12">
                        {!! Form::submit('SIGNUP', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}

                <p class="col-xs-12">ALREADY A MEMBER? {!! link_to_route('login', 'LOGIN') !!}</p>
            </div>
        </div>
    </div>
@endsection