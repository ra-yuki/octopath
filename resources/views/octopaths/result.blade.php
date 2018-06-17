@extends('layouts.app')

@section('title')
    Result
@endsection

@section('head-plus')
    <script type="text/javascript" src="{{ URL::asset('js/clipboard.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/result.css')}}">
@endsection

@section('content')
    <div id="top-wrapper" class="container text-center">
        <h1 class="txt-white">Octpath Created!</h1>
        <div id="copybox" class="col-xs-12">
            <input class="input-transparent col-xs-8 col-md-offset-3 col-md-4" id="octopath_url" type="text" value="{{ $octopath_url }}"></input>
            <button class="btn btn-yellow col-xs-4 col-md-2" id="button2copy" onclick="copy2Clipboard('octopath_url', 'button2copy')">Copy</button> <!-- onmouseout="" -->
        </div>
    </div>
@endsection