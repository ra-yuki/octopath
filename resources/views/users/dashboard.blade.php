@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('head-plus')
    <link rel="stylesheet" href={{ asset('css/dashboard.css') }}>
    <script src="{{ asset('js/search.js') }}"></script>
@endsection

@section('content')
    <div id="top-container-wrapper text-lowercase">
        <div class="container">
            {{-- title --}}
            <div id="top-title" class="text-center text-uppercase">
                <h1>Dashboard</h1>
            </div>

            {{-- search field --}}
            <div class="form-group col-xs-12">
                {!! 
                    Form::text('search-field', null, [
                        'id' => 'search-field',
                        'class' => 'form-control',
                        'placeholder' => 'Search Octopath',
                        'onkeyup' => 'searchOctopaths()',
                    ])
                !!}
            </div>

            {{-- comments from searchOctopath() if nothing found --}}
            <p id="comment" class="text-center"></p>

            {{-- octopath table starts --}}
            <div id="top-table" class="col-xs-12">
                <table class="table col-xs-12">
                    <tbody id="octopath-table">
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
                                            <span class="search-subject">{{ $meta_dataset->title }}</span>
                                        @else
                                            <span class="search-subject">*NO TITLE*</span>
                                        @endif
                                    </td>
                                    {{-- created at --}}
                                    <td class="text-right">
                                        <?php $created_at = explode(' ', $meta_dataset->created_at)[0]; ?>
                                        merged on {{ $created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- end of octopath table --}}
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