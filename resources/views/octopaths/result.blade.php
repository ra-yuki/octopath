@extends('layouts.app')

@section('title')
    OctpathURL
@endsection

@section('head-plus')
    <script type="text/javascript" src="{{ URL::asset('js/clipboard.js') }}"></script>
@endsection

@section('content')
    <h1>Octpath Created!</h1>
    <input id="octopath_url" type="text" value="{{ $octopath_url }}"></input>
    <button id="button2copy" onclick="copy2Clipboard('octopath_url', 'button2copy')">Copy</button> <!-- onmouseout="" -->
@endsection    