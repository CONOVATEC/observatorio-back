<div class="d-flex align-items-center col-actions">
    @can('etiquetas.restaurar')
    <form method="get" action="{{route('etiquetas.restaurar',  $tagEliminated->id)}}">
        @csrf
        <button href="#" class="dropdown-item restoreConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Restaurar ">
            <i class="fa-solid fa-check-to-slot font-medium-2 text-primary"></i>
        </button>
    </form>
    @endcan
    @can('etiquetas.eliminar.definitivo')
    <form method="get" action="{{route('etiquetas.eliminar.definitivo',  $tagEliminated->id)}}">
        @csrf
        <button href="#" class="dropdown-item deleteDefinitiveConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar definitivamente">
            <i class="fa-solid fa-ban text-danger font-medium-2 "></i>
        </button>
    </form>
    @endcan
</div>
