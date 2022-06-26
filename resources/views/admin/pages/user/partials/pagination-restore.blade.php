<div class="overflow-auto flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">

    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $users->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $users->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $users->total() }}</span>
            {!! __('results') !!}
        </p>

    </div>
    <div class="">

        {{$users->withQueryString()->links()}}
    </div>
</div>
