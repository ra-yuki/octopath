@extends('layouts.app')

@section('title')
    Top
@endsection

@section('content')
    <h1>Octopath</h1>
    @if(count($octopaths) > 0)
        @foreach($octopaths as $octopath)
            <p>{{ $octopath }}</p>
        @endforeach
    @endif
    
    {!! link_to_route('octopaths.create', 'Create Octopath') !!}
    <br>
    {!! link_to_route('octopaths.dashboard', 'Dashboard') !!}
@endsection