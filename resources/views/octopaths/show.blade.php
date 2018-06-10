@extends('layouts.app')

@section('title')
    OctpathURL
@endsection

@section('content')
    <h1>{{ $meta_data->title }}</h1>
    <h5><a href="{{ $octopath_url }}">{{ $octopath_url }}</a></h5>
    <hr>
    @if(count($octopath_datasets) > 0)
        @foreach($octopath_datasets as $octopath)
            <h3>{{ $octopath->title }}</h3>
            <h4>{{ $octopath->description }}</h4>
            <h5><a href="{{ $octopath->link }}">{{ $octopath->link }}</a></h5>
        @endforeach
    @endif
@endsection