@extends('layouts.app_no_err')

@section('content')
    <h1>403</h1>
    <h3>HMM... YOUR ACTION SEEMS UNAUTHORIZED.</h3>
    <p>HINT: {!! link_to_route('login', 'FORGOT TO LOGIN?') !!}</p>
@endsection