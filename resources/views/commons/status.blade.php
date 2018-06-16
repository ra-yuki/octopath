@if( null !== session('status') )
<div class="container">
    <div class="col-xs-12">
        <div class="alert alert-info">{{ session('status') }}</div>
    </div>
</div>
@endif