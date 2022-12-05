<div class="d-flex align-items-center col-actions">
    @can('etiquetas.edit')
    <a class="dropdown-item" href="{{ route('etiquetas.edit',$tag) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
        <i class="fa-solid fa-pen-to-square font-medium-2 text-body"></i>
    </a>
    @endcan
    @can('etiquetas.destroy')
    <form method="post" action="{{route('etiquetas.destroy',$tag->id)}}">
        @method('DELETE')
        @csrf
        <button href="#" class="dropdown-item deleteConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar ">
            <i class="fa-solid fa-trash-can font-medium-2"></i>
        </button>
    </form>
    @endcan
</div>
