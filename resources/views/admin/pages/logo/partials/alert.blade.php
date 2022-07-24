@if (session('success'))
    <div class="alert alert-success">
        <div class="alert-body">{{session('success')}}</div>
    </div>
@endif


@if (session('info'))
    <div class="alert alert-info">
        <div class="alert-body">{{session('info')}}</div>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning">
        <div class="alert-body">{{session('warning')}}</div>
    </div>
@endif
