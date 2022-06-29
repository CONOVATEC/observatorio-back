<div class="overflow-auto flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between mx-2">
    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $posts->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $posts->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $posts->total() }}</span>
            {!! __('results') !!}
        </p>

    </div>
    <div class="">
        {{$posts->withQueryString()->links()}}
    </div>
</div>
