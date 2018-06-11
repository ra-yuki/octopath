@extends('layouts.app')

@section('content')
    {{-- Octopath creation form --}}
    {!! Form::model($meta_dataset, ['route'=> ['octopaths.update', $meta_dataset->octopath], 'method' => 'put']) !!}
        {!! Form::label('octopath_title', 'Octopath Title') !!}
        {!! Form::text('octopath_title', $meta_dataset->title) !!}
        <br>
        {!! Form::label('retention_date', 'Retention date') !!}
        {!! Form::date('retention_date', $meta_dataset->retention_date) !!}
        <br>
        
        @for($i=0; $i<$merge_num; $i++)
            @if($i < count($octopath_datasets))
                {{-- title form --}}
                {!! Form::label('title'. ($i+1), 'Title'. ($i+1)) !!}
                {!! Form::text( 'title'. ($i+1), $octopath_datasets[$i]->title ) !!}
                <br>
                
                {{-- link form --}}
                {!! Form::label('link'. ($i+1), 'Link'. ($i+1)) !!}
                {!! Form::text( 'link'. ($i+1), $octopath_datasets[$i]->link ) !!}
                <br>
                
                {{-- description form --}}
                {!! Form::label('description'. ($i+1), 'Description'. ($i+1)) !!}
                {!! Form::text( 'description'. ($i+1), $octopath_datasets[$i]->description ) !!}
                <br>
            @else
                {{-- title form --}}
                {!! Form::label('title'. ($i+1), 'Title'. ($i+1)) !!}
                {!! Form::text( 'title'. ($i+1) ) !!}
                <br>
                
                {{-- link form --}}
                {!! Form::label('link'. ($i+1), 'Link'. ($i+1)) !!}
                {!! Form::text( 'link'. ($i+1) ) !!}
                <br>
                
                {{-- description form --}}
                {!! Form::label('description'. ($i+1), 'Description'. ($i+1)) !!}
                {!! Form::text( 'description'. ($i+1) ) !!}
                <br>
            @endif
            <br>
        @endfor
        
        {{-- send merge_num number --}}
        <input type="hidden" name="merge_num" value="{{ $merge_num }}">

        {!! Form::submit('UPDATE') !!}
    {!! Form::close() !!}

    <a href="/{{$meta_dataset->octopath}}/edit?merge_num={{ $merge_num_plus_one }}"><button class="btn btn-success">+ link</button></a>
    <a href="/{{$meta_dataset->octopath}}/edit?merge_num={{ $merge_num_minus_one }}"><button class="btn btn-danger">- link</button></a>
@endsection