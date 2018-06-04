@extends('layouts.app')

@section('title')
    Create
@endsection

@section('content')
    {{-- Octopath creation form --}}
    {!! Form::model($octopath, ['route'=>'octopaths.store']) !!}
        @for($i=0; $i<$merge_num; $i++)
            {{-- title form --}}
            {!! Form::label('title'. ($i+1), 'Title'. ($i+1)) !!}
            {!! Form::text('title'. ($i+1)) !!}
            <br>
            
            {{-- link form --}}
            {!! Form::label('link'. ($i+1), 'Link'. ($i+1)) !!}
            {!! Form::text('link'. ($i+1)) !!}
            <br>
            
            {{-- description form --}}
            {!! Form::label('description'. ($i+1), 'Description'. ($i+1)) !!}
            {!! Form::text('description'. ($i+1)) !!}
            <br>
            
            <br>
        @endfor
        
        {{-- send merge number(how many links to merge) --}}
        {!! Form::hidden('merge_num', $merge_num) !!}
        
        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
@endsection