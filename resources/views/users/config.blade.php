@extends('layouts.app')

@section('content')
    <h1>USER SETTINGS</h1>
    <ul>
        <li>NAME: {{ $user->name }}</li>
        <li>EMAIL: {{ $user->email }}</li>
        <li>PASSWD: <a href="#">change password</a></li>
    </ul>
@endsection