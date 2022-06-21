<div class="overflow-auto flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">

    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $categoriesEliminated->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $categoriesEliminated->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $categoriesEliminated->total() }}</span>
            {!! __('results') !!}
        </p>

        {{-- Monstrando {{ $categoriesEliminated->currentPage() * $categoriesEliminated->perPage() - 9 }}
        to {{ $categoriesEliminated->currentPage() * $categoriesEliminated->perPage() }} de
        {{ $categoriesEliminated->total() }} registros --}}
    </div>
    <div class="">

        {{$categoriesEliminated->withQueryString()->links()}}
    </div>
</div>
