<div class="overflow-auto flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">

    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $grades->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $grades->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $grades->total() }}</span>
            {!! __('results') !!}
        </p>

        {{-- Monstrando {{ $categories->currentPage() * $categories->perPage() - 9 }}
        to {{ $categories->currentPage() * $categories->perPage() }} de
        {{ $categories->total() }} registros --}}
    </div>
    <div class="">

        {{$grades->withQueryString()->links()}}
    </div>
</div>
