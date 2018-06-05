@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    
    <h2>octopaths table</h2>
    @if(count($octopath_datasets) > 0)
        @foreach($octopath_datasets as $octopath)
            <h3>{{ $octopath->title }} [octopath: {{ $octopath->octopath }}]</h3>
            <ul>
                <li><b>link</b>: <a href="{{ $octopath->link }}">{{ $octopath->link }}</a></li>
                <li><b>description</b>: {{ $octopath->description }}</li>
                <li><b>diaplay_order</b>: {{ $octopath->display_order }}</li>
            </ul>
        @endforeach
    @endif
    <br>
    
    <hr>
    <h2>meta_datasets table</h2>
    @if(count($meta_datasets) > 0)
        @foreach($meta_datasets as $meta_dataset)
            <h3>{{ $meta_dataset->title }} [octopath: {{ $meta_dataset->octopath }}]</h3>
            <ul>
                <li><b>enabled</b>: {{ $meta_dataset->enabled }}</li>
                <li><b>retention_date</b>: {{ $meta_dataset->retention_date }}</li>
            </ul>
        @endforeach
    @endif
@endsection