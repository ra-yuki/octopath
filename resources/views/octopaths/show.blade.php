@extends('layouts.app')

@section('content')
    <h1>Octopath: <a href="{{ $octopath_url }}">{{ $octopath_url }}</a></h1>
    @if(count($octopaths) > 0)
        @foreach($octopaths as $octopath)
            <h3>{{ $octopath->title }}</h3>
            <ul>
                <li><b>link</b>: <a href="{{ $octopath->link }}">{{ $octopath->link }}</a></li>
                <li><b>description</b>: {{ $octopath->description }}</li>
                <li><b>diaplay_order</b>: {{ $octopath->display_order }}</li>
            </ul>
        @endforeach
    @endif
@endsection