@extends('layouts.app_no_err')

@section('title')
    Not Found
@endsection

@section('head-plus')
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
@endsection

@section('content')
    <div id="top-wrapper" class="container txt-white text-center">
        <h1>404</h1>
        <h3>SORRY, THE PAGE NOT FOUND.</h3>
    </div>
@endsection