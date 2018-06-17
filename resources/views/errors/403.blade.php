@extends('layouts.app_no_err')

@section('title')
    403 Not Authorized
@endsection

@section('head-plus')
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
@endsection

@section('content')
    <div id="top-wrapper" class="container txt-white text-center">
        <h1>403</h1>
        <h3>HMM... YOUR ACTION SEEMS UNAUTHORIZED.</h3>
        <p>HINT: {!! link_to_route('login', 'FORGOT TO LOGIN?', null, ['class' => 'txt-lightblue']) !!}</p>
    </div>
@endsection