@extends('layouts.app')

@section('title')
    {{ $meta_dataset->title }}
@endsection

@section('head-plus')
    <script type="text/javascript" src="{{ URL::asset('js/clipboard.js') }}"></script>
    <link rel="stylesheet" href={{ asset('css/show.css') }}>
@endsection

@section('content')
<div id="top-wrapper">
    <div class="container">
        <div class="col-xs-12 txt-white">
            <div class="col-xs-12">
                <h1 class="text-center">{{ $meta_dataset->title }}</h1>
                <div id="copybox">
                    <input class="input-transparent col-xs-8 col-md-offset-3 col-md-4" id="octopath_url" type="text" value="{{ $octopath_url }}"></input>
                    <button class="btn btn-yellow col-xs-4 col-md-2" id="button2copy" onclick="copy2Clipboard('octopath_url', 'button2copy')">Copy</button> <!-- onmouseout="" -->
                </div>
            </div>
            <div id="datasets" class="col-xs-12">
                @if(count($octopath_datasets) > 0)
                    @foreach($octopath_datasets as $octopath)
                        <a id="{{$octopath->id}}" href="{{ $octopath->link }}" target="{{$octopath->id}}">
                            <div id="dataset" class="col-xs-12">
                                <h3>{{ $octopath->title }}</h3>
                                <h4>{{ $octopath->description }}</h4>
                                <h5>{{ $octopath->link }}</h5>
                            </div>
                        </a>
                        <br>
                    @endforeach
                @endif
            </div>
            <div id="top-buttons" class="col-xs-12">
                @if (Auth::check())
                    <div class="col-xs-6">
                        {!! link_to_route('octopaths.edit', 'EDIT', ['octopath' => $meta_dataset->octopath], ['class' => 'btn btn-yellow btn-block']) !!}
                    </div>
                    <div class="col-xs-6">
                        {!! Form::open([ 'route' => ['octopaths.destroy', $meta_dataset->octopath], 'method' => 'delete' ]) !!}
                            {!! Form::submit('DELETE', ['class' => 'btn btn-red btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection