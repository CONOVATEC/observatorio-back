<div class="overflow-auto flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">

    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $positionsEliminated->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $positionsEliminated->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $positionsEliminated->total() }}</span>
            {!! __('results') !!}
        </p>

        {{-- Monstrando {{ $categoriesEliminated->currentPage() * $categoriesEliminated->perPage() - 9 }}
        to {{ $categoriesEliminated->currentPage() * $categoriesEliminated->perPage() }} de
        {{ $categoriesEliminated->total() }} registros --}}
    </div>
    <div class="">

        {{$positionsEliminated->withQueryString()->links()}}
    </div>
</div>
