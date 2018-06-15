@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('head-plus')
    <link rel="stylesheet" href={{ asset('css/dashboard.css') }}>
@endsection

@section('content')
    <div id="top-container-wrapper text-lowercase">
        <div class="container">
            <div id="top-title" class="text-center text-uppercase">
                <h1>Dashboard</h1>
            </div>
            <div id="top-table" class="col-xs-12">
                <table class="table col-xs-12">
                    <tbody class="">
                        @if(count($meta_datasets) > 0)
                            @foreach($meta_datasets as $meta_dataset)
                                <tr>
                                    {{-- edit/delete --}}
                                    <td>
                                        {!! link_to_route('octopaths.show', '+', ['octopath' => $meta_dataset->octopath], ['class' => 'btn btn-default']) !!}
                                    </td>
                                    {{-- title --}}
                                    <td>
                                        @if($meta_dataset->title != "")
                                            {{ $meta_dataset->title }}
                                        @else
                                            *NO TITLE*
                                        @endif
                                    </td>
                                    {{-- created at --}}
                                    <td class="text-right">
                                        merged at {{ $meta_dataset->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
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