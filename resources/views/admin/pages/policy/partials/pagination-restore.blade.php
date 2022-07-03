<div class="overflow-auto flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">

    <div>
        <p class="small text-muted">
            {!! __('Showing') !!}
            <span class="font-medium">{{ $policiesEliminated->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $policiesEliminated->lastItem() }}</span>
            {!! __('of') !!}
            <span class="font-medium">{{ $policiesEliminated->total() }}</span>
            {!! __('results') !!}
        </p>

        {{-- Monstrando {{ $categoriesEliminated->currentPage() * $categoriesEliminated->perPage() - 9 }}
        to {{ $categoriesEliminated->currentPage() * $categoriesEliminated->perPage() }} de
        {{ $categoriesEliminated->total() }} registros --}}
    </div>
    <div class="">

        {{$policiesEliminated->withQueryString()->links()}}
    </div>
</div>
