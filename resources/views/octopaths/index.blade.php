@extends('layouts.app')

@section('title')
    Top
@endsection

@section('content')
    <h1>Octopath</h1>
    @if(count($octopath_datasets) > 0)
        @foreach($octopath_datasets as $octopath)
            <p>{{ $octopath }}</p>
        @endforeach
    @endif
    
    {!! link_to_route('octopaths.create', 'Create Octopath') !!}
    <br>
    {!! link_to_route('octopaths.dashboard', 'Dashboard') !!}
@endsection