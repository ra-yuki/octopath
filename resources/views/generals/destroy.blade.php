@extends('layouts.app')

@section('content')
    <h1>OCTOPATH({{$octopath}}) IS DELETED SUCCESSFULLY.</h1>

    {{link_to_route('users.dashboard','BACK TO DASHBOARD')}}
@endsection