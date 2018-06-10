@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    
    @if(count($meta_datasets) > 0)
        @foreach($meta_datasets as $meta_dataset)
            <hr>
            
            @if($meta_dataset->title != "")
                <h3>{{ $meta_dataset->title }} {!! link_to_route('octopaths.show', 'SEE MORE', ['octopath' => $meta_dataset->octopath]) !!}</h3>
            @else
                <h3>*NO TITLE  {!! link_to_route('octopaths.show', 'SEE MORE', ['octopath' => $meta_dataset->octopath]) !!}</h3>
            @endif
            <p>{!! link_to_route('octopaths.edit', 'EDIT', ['octopath' => $meta_dataset->octopath], ['class' => 'btn btn-primary']) !!}</p>
            {!! Form::open([ 'route' => ['octopaths.destroy', $meta_dataset->octopath], 'method' => 'delete' ]) !!}
                {!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endforeach
    @endif
    <br>
    
    <!--
    <h2>octopaths table</h2>
    {{-- @if(count($octopath_datasets) > 0)
        @foreach($octopath_datasets as $octopath)
            <h3>{{ $octopath->title }} [octopath: {{ $octopath->octopath }}]</h3>
            <ul>
                <li><b>link</b>: <a href="{{ $octopath->link }}">{{ $octopath->link }}</a></li>
                <li><b>description</b>: {{ $octopath->description }}</li>
                <li><b>diaplay_order</b>: {{ $octopath->display_order }}</li>
            </ul>
        @endforeach
    @endif
    --}}
        -->
@endsection