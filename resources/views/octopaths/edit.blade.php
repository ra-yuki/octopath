@extends('layouts.app')

@section('content')
    {{-- Octopath creation form --}}
    {!! Form::model($meta_dataset, ['route'=> ['octopaths.update', $meta_dataset->octopath], 'method' => 'put']) !!}
        {!! Form::label('octopath_title', 'Octopath Title') !!}
        {!! Form::text('octopath_title') !!}
        <br>
        {!! Form::label('retention_date', 'Retention date') !!}
        {!! Form::date('retention_date') !!}
        <br>
        
        @for($i=0; $i<count($octopath_datasets); $i++)
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
        
        {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
@endsection