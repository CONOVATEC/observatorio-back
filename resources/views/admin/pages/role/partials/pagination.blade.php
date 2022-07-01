<div class="overflow-auto flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">

    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $roles->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $roles->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $roles->total() }}</span>
            {!! __('results') !!}
        </p>

    </div>
    <div class="">
        {{$roles->withQueryString()->links()}}
    </div>
</div>
