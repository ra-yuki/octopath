@extends('layouts.app')

@section('title')
    Merge
@endsection

@section('content')
    {{-- Octopath creation form --}}
    {!! Form::model($octopath_dataset, ['route'=>'octopaths.store']) !!}
        {!! Form::label('octopath_title', 'Octopath Title') !!}
        {!! Form::text('octopath_title') !!}
        <br>
        {!! Form::label('retention_date', 'Retention date') !!}
        {!! Form::date('retention_date', $default_retention_date) !!}
        <br>
        
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
        {{-- {!! Form::text('merge_num', $merge_num) !!} --}}
        <input type="hidden" name="merge_num" value="{{ $merge_num }}">
        
        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
    
    <a href="/create?merge_num={{ $merge_num_plus_one }}"><button>+ link</button></a>
    <a href="/create?merge_num={{ $merge_num_minus_one }}"><button>- link</button></a>
@endsection