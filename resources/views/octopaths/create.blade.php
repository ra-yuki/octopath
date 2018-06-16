@extends('layouts.app')

@section('title')
    Merge
@endsection

@section('head-plus')
    <link rel="stylesheet" href={{ asset('css/merge-form.css') }}>
@endsection

@section('content')
    <div id="top-container_wrappper" class="text-uppercase">
        <div id="top-container" class="container">
            <div id="top-title" class="col-xs-12">
                <h1 class="text-center">MERGE LINKS</h1>
            </div>
            <div id="top-form" class="col-xs-12 col-md-10 col-md-offset-1">                
                {{-- Octopath creation form --}}
                {!! Form::model($octopath_dataset, ['route'=>'octopaths.store']) !!}
                    
                    {{-- *--hidden forms--* --}}
                    {!! Form::hidden('retention_date', $default_retention_date) !!}
                    {{-- send merge number(how many links to merge) --}}
                    <input type="hidden" name="merge_num" value="{{ $merge_num }}">

                    <div class="form-group col-xs-12">
                        {{-- *--apparent forms--* --}}
                        {{--{!! Form::label('octopath_title', 'OCTOPATH TITLE') !!}--}}
                        <h4>OCTOPATH TITLE</h4>
                        {!! Form::text('octopath_title', old('octopath_title'), ['class' => 'form-control', 'placeholder' => 'List of EC Websites']) !!}
                    </div>

                    @for($i=0; $i<$merge_num; $i++)
                        <div class="form-group col-xs-12">
                            <h4>LINK{{ $i+1 }}</h4>
                            <div>
                                {{-- link form --}}
                                {{-- {!! Form::label('link'. ($i+1), 'url') !!} --}}
                                url
                                {!! Form::text( 'link'. ($i+1), old('link'. ($i+1)), ['class' => 'form-control input-md', 'placeholder' => 'https://www.rakuten.com/'] ) !!}
                            </div>
                            <div>
                                {{-- title form --}}
                                {{-- {!! Form::label('title'. ($i+1), 'title') !!} --}}
                                title
                                {!! Form::text( 'title'. ($i+1), old('title'. ($i+1)), ['class' => 'form-control input-md', 'placeholder' => 'Rakuten'] ) !!}
                            </div>
                            <div>
                                {{-- description form --}}
                                {{-- {!! Form::label('description'. ($i+1), 'Description') !!} --}}
                                description
                                {!! Form::text( 'description'. ($i+1), old('description'. ($i+1)), ['class' => 'form-control input-md', 'placeholder' => 'This website looks legit!'] ) !!}
                            </div>
                        </div>
                    @endfor
                    
                    <div class="col-xs-6">
                        <a href="/create?merge_num={{ $merge_num_plus_one }}" class="btn btn-success btn-block"><h3>+</h3></a>
                    </div>
                    <div class="col-xs-6">
                        <a href="/create?merge_num={{ $merge_num_minus_one }}" class="btn btn-danger btn-block"><h3>-</h3></a>
                    </div>
                    <div id="submit" class="col-xs-12">
                        {!! Form::submit('MERGE', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    
    
@endsection