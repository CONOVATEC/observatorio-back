<div class="overflow-auto flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">

    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $categories->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $categories->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $categories->total() }}</span>
            {!! __('results') !!}
        </p>

        {{-- Monstrando {{ $categories->currentPage() * $categories->perPage() - 9 }}
        to {{ $categories->currentPage() * $categories->perPage() }} de
        {{ $categories->total() }} registros --}}
    </div>
    <div class="">

        {{$categories->withQueryString()->links()}}
    </div>
</div>
