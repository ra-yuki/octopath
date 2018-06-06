@extends('layouts.app')

@section('title')
    Home
@endsection

@section('head-plus')
    <link rel="stylesheet" href={{ asset('css/index.css') }}>
@endsection

@section('content')
    <div id="top-container_wrapper">
        <div id="top-container" class="container">
            <div id="top-welcome_screen" class="col-xs-12">
                <h1>PUT ONCE, LINK ANYWHERE.</h1>
                <h2>STAY AWAY FROM MULTIPLE LENGTHY LINKS, AND DRIVE YOUR COMMUNICATION EFFICIENCY.</h2>
                <p><a href="/create" class="btn btn-default">MERGE LINKS</a></p>
            </div>
        </div>
    </div>
    <div id="middle-container_wrapper">
        <div id="middle-container" class="container">
            <div id="middle-instruction" class="col-xs-4">
                <h1>1. MERGE LINKS</h1>
            </div>
            <div id="middle-instruction2" class="col-xs-4">
                <h1>2. PASTE ON MESSSAGE</h1>
            </div>
            <div id="middle-instruction3" class="col-xs-4">
                <h1>3. OCTOPATH!</h1>
            </div>
        </div>
    </div>
    <div id="bottom-container_wrapper">
        <div id="bottom-container" class="container">
            <div id="bottom-merge_links" class="col-xs-8 col-xs-offset-2">
                <h1>MERGE YOUR: <span class="emphasize">WHATEVER</span></h1>
                {!! Form::model($octopath_dataset, ['route'=>'octopaths.store']) !!}
                    {!! Form::hidden('octopath_title', '') !!}
                    {!! Form::hidden('retention_date', $default_retention_date) !!}

                    @for($i=0; $i<$merge_num; $i++)
                        <div id="bottom-form_input" class="col-xs-12">
                            {{-- title form --}}
                            {!! Form::hidden('title'. ($i+1), '') !!}
                            
                            {{-- link form --}}
                            {!! Form::label('link'. ($i+1), 'LINK'. ($i+1)) !!}
                            {!! Form::text('link'. ($i+1)) !!}
    
                            {{-- description form --}}
                            {!! Form::hidden('description'. ($i+1), '') !!}
                        </div>
                    @endfor
                    
                    {{-- send merge number(how many links to merge) --}}
                    {{-- {!! Form::text('merge_num', $merge_num) !!} --}}
                    <input type="hidden" name="merge_num" value="{{ $merge_num }}">
                    
                    <br>
                    {!! Form::submit('MERGE', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}            
            </div>
        </div>
    </div>
@endsection