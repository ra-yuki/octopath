@extends('layouts.app')

@section('content')
    <h1>{{ $meta_data[0]->title }}</h1>
    <h2>Octopath: <a href="{{ $octopath_url }}">{{ $octopath_url }}</a></h2>
    @if(count($octopath_datasets) > 0)
        @foreach($octopath_datasets as $octopath)
            <h3>{{ $octopath->title }}</h3>
            <ul>
                <li><b>link</b>: <a href="{{ $octopath->link }}">{{ $octopath->link }}</a></li>
                <li><b>description</b>: {{ $octopath->description }}</li>
                <li><b>diaplay_order</b>: {{ $octopath->display_order }}</li>
            </ul>
        @endforeach
    @endif
@endsection