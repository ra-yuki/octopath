@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('head-plus')
    <link rel="stylesheet" href="{{asset('css/merge-form.css')}}">
@endsection

@section('content')
    <div id="top-container_wrappper" class="text-uppercase">
        <div id="top-container" class="container">
            <div id="top-title" class="col-xs-12">
                <h1 class="text-center">EDIT LINKS</h1>
            </div>
            <div id="top-form" class="col-xs-12 col-md-10 col-md-offset-1">
                {{-- Octopath creation form --}}
                {!! Form::model($meta_dataset, ['route'=> ['octopaths.update', $meta_dataset->octopath], 'method' => 'put']) !!}
                    <div class="form-group col-xs-12">
                        <h4>OCTOPATH TITLE</h4>
                        {!! Form::text('octopath_title', $meta_dataset->title, ['class' => 'form-control', 'placeholder' => 'List of EC Websites']) !!}
                    </div>

                    {{-- {!! Form::label('retention_date', 'Retention date') !!} --}}
                    {!! Form::hidden('retention_date', $meta_dataset->retention_date) !!}
                    
                    @for($i=0; $i<$merge_num; $i++)
                        @if($i < count($octopath_datasets))
                            <div class="form-group col-xs-12">
                                <h4>link {{ $i+1 }}</h4>
                                {{-- link form --}}
                                {{-- {!! Form::label('link'. ($i+1), 'Link'. ($i+1)) !!} --}}
                                url
                                {!! Form::text( 'link'. ($i+1), $octopath_datasets[$i]->link, ['class' => 'form-control input-md', 'placeholder' => 'https://www.rakuten.com/'] ) !!}
                                
                                {{-- title form --}}
                                {{-- {!! Form::label('title'. ($i+1), 'Title'. ($i+1)) !!} --}}
                                title
                                {!! Form::text( 'title'. ($i+1), $octopath_datasets[$i]->title, ['class' => 'form-control input-md', 'placeholder' => 'Rakuten'] ) !!}
                                
                                {{-- description form --}}
                                {{-- {!! Form::label('description'. ($i+1), 'Description'. ($i+1)) !!} --}}
                                description
                                {!! Form::text( 'description'. ($i+1), $octopath_datasets[$i]->description, ['class' => 'form-control input-md', 'placeholder' => 'This website looks legit!'] ) !!}
                            </div>
                        @else
                            <div class="form-group col-xs-12">
                                <h4>link {{ $i+1 }}</h4>
                                {{-- link form --}}
                                {{-- {!! Form::label('link'. ($i+1), 'Link'. ($i+1)) !!} --}}
                                url
                                {!! Form::text( 'link'. ($i+1), null, ['class' => 'form-control input-md', 'placeholder' => 'Rakuten'] ) !!}
                                
                                {{-- title form --}}
                                {{-- {!! Form::label('title'. ($i+1), 'Title'. ($i+1)) !!} --}}
                                title
                                {!! Form::text( 'title'. ($i+1), null, ['class' => 'form-control input-md', 'placeholder' => 'https://www.rakuten.com/'] ) !!}
                                
                                
                                {{-- description form --}}
                                {{-- {!! Form::label('description'. ($i+1), 'Description'. ($i+1)) !!} --}}
                                description
                                {!! Form::text( 'description'. ($i+1), null, ['class' => 'form-control input-md', 'placeholder' => 'This website looks legit!'] ) !!}
                            </div>
                        @endif
                    @endfor
                    
                    {{-- send merge_num number --}}
                    <input type="hidden" name="merge_num" value="{{ $merge_num }}">
                    
                    <div class="col-xs-6">
                        <a href="/{{ $meta_dataset->octopath }}/edit?merge_num={{ $merge_num_plus_one }}" class="btn btn-success btn-block"><h3>+</h3></a>
                    </div>
                    <div class="col-xs-6">
                        <a href="/{{ $meta_dataset->octopath }}/edit?merge_num={{ $merge_num_minus_one }}" class="btn btn-danger btn-block"><h3>-</h3></a>
                    </div>

                    <div id="submit" class="col-xs-12">
                        {!! Form::submit('UPDATE', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection