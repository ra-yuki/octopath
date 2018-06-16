@extends('layouts.app_no_err')

@section('title')
    Home
@endsection

@section('head-plus')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/p5.min.js"></script>
    <script>var assetBasePath = "{{ asset('') }}"; //used in sketch_top.js to anchor img files</script>
    <script src="{{ asset('js/sketch_top.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <!-- inserts p5 sketch here -->
    <div id="sketch-holder"></div>
    <!-- ends p5 sketch here -->

    <div id="top-container_wrapper">
        <div id="top-container" class="container">
            <div id="top-welcome_screen" class="col-xs-12">
                <h1><span>PUT ONCE, LINK ANYWHERE.</span></h1>
                <h2><span>STAY AWAY FROM MULTIPLE LENGTHY LINKS, AND DRIVE YOUR COMMUNICATION EFFICIENCY.</span></h2>
                <p><a href="/create" class="btn btn-default">MERGE LINKS</a></p>
            </div>
        </div>
    </div>
    <div id="middle-container_wrapper">
        <div id="middle-container" class="container">
            <div class="col-xs-12 col-md-4">
                <h1>1. MERGE LINKS</h1>
                <p><img src="{{ asset('img/merge_red.png') }}" alt=""></p>
                <figcaption>DOCUMENT, COOKING RECIPE, YOUTUBE VIDEO...</figcaption>
            </div>
            <div class="col-xs-12 col-md-4">
                <h1>2. PASTE IT</h1>
                <p><img src="{{ asset('img/paste_dark.png') }}" alt=""></p>
                <figcaption>ON VIBER, WEBSITE, OR EVEN YOUR PORTOFOLIO</figcaption>
            </div>
            <div class="col-xs-12 col-md-4">
                <h1>3. ALL SET!</h1>
                <p><img src="{{ asset('img/octopath_red.png') }}" alt=""></p>
                <figcaption>BOOOM! SPREAD YOUR PATHS TO THE WORLD! :)</figcaption>
            </div>
        </div>
    </div>
    <div id="bottom-container_wrapper">
        <div id="bottom-container" class="container">
            <div id="bottom-merge_links" class="col-xs-12 col-md-8 col-md-offset-2">
                <h1>MERGE YOUR: <span class="emphasize">WHATEVER</span></h1>
                {{-- error message --}}
                @include('commons.error')
                {!! Form::model($octopath_dataset, ['route'=>'octopaths.store']) !!}
                {!! Form::hidden('retention_date', $default_retention_date) !!}

                    <div id="bottom-form_input" class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('octopath_title', 'TITLE') !!}
                            {!! Form::text('octopath_title', null, ['class' => 'form-control']) !!}
                        </div>
                        @for($i=0; $i<$merge_num; $i++)
                                {{-- title form --}}
                                {!! Form::hidden('title'. ($i+1), 'LINK'. ($i+1)) !!}
                                
                                <div class="form-group">
                                    {{-- link form --}}
                                    {!! Form::label('link'. ($i+1), 'LINK'. ($i+1)) !!}
                                    {!! Form::text('link'. ($i+1), null, ['class' => 'form-control']) !!}
                                </div>
        
                                {{-- description form --}}
                                {!! Form::hidden('description'. ($i+1), '') !!}
                        @endfor
                    </div>
                    
                    {{-- send merge number(how many links to merge) --}}
                    {{-- {!! Form::text('merge_num', $merge_num) !!} --}}
                    <input type="hidden" name="merge_num" value="{{ $merge_num }}">
                    
                    <div class="col-xs-12">
                        {!! Form::submit('MERGE LINKS', ['id' => 'submit-btn', 'class' => 'btn btn-default btn-block']) !!}
                    </div>
                {!! Form::close() !!}            
            </div>
        </div>
    </div>
@endsection