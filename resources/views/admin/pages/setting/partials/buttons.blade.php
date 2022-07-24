<div class="d-flex align-items-center col-actions">
    @can('configuraciones.edit')
    <a class="dropdown-item" href="{{ route('configuraciones.edit',$setting) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
        <i class="fa-solid fa-pen-to-square font-medium-2 text-body"></i>
    </a>
    @endcan
</div>
