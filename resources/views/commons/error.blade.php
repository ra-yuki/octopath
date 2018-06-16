@if(count($errors->all()))
<div class="container">
    <div class="col-xs-12">
        @foreach ($errors->all() as $e)
            <div class="alert alert-danger">{{$e}}</div>
        @endforeach
    </div>
</div>
@endif