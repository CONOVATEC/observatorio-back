<div class="overflow-auto flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">

    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $thematics->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $thematics->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $thematics->total() }}</span>
            {!! __('results') !!}
        </p>

        {{-- Monstrando {{ $categories->currentPage() * $categories->perPage() - 9 }}
        to {{ $categories->currentPage() * $categories->perPage() }} de
        {{ $categories->total() }} registros --}}
    </div>
    <div class="">

        {{$thematics->withQueryString()->links()}}
    </div>
</div>
