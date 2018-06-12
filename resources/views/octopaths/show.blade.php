@extends('layouts.app')

@section('title')
    OctpathURL
@endsection

@section('content')
    <h1>{{ $meta_dataset->title }}</h1>
    <h5><a href="{{ $octopath_url }}">{{ $octopath_url }}</a></h5>
    <hr>
    @if(count($octopath_datasets) > 0)
        @foreach($octopath_datasets as $octopath)
            <h3>{{ $octopath->title }}</h3>
            <h4>{{ $octopath->description }}</h4>
            <h5><a href="{{ $octopath->link }}" target="_blank">{{ $octopath->link }}</a></h5>
        @endforeach
    @endif
    @if (Auth::check())
        <p>{!! link_to_route('octopaths.edit', 'EDIT', ['octopath' => $meta_dataset->octopath], ['class' => 'btn btn-primary']) !!}</p>
        {!! Form::open([ 'route' => ['octopaths.destroy', $meta_dataset->octopath], 'method' => 'delete' ]) !!}
            {!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif
@endsection