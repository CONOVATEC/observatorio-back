<div class="overflow-auto flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">

    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $policies->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $policies->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $policies->total() }}</span>
            {!! __('results') !!}
        </p>

        {{-- Monstrando {{ $categories->currentPage() * $categories->perPage() - 9 }}
        to {{ $categories->currentPage() * $categories->perPage() }} de
        {{ $categories->total() }} registros --}}
    </div>
    <div class="">

        {{$policies->withQueryString()->links()}}
    </div>
</div>
