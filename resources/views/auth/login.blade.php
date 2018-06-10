@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>LOGIN</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'EMAIL') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'PASSWORD') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('LOGIN', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}

            <p>NOT A MEMBER? {!! link_to_route('signup.get', 'SIGNUP') !!}</p>
        </div>
    </div>
@endsection