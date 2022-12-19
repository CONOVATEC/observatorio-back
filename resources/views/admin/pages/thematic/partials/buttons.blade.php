<div class="d-flex align-items-center col-actions">
    @can('tematica.edit')
    <a class="dropdown-item" href="{{ route('tematica.edit',$thematic) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
        <i class="fa-solid fa-pen-to-square font-medium-2 text-body"></i>
    </a>
    @endcan
    @can('tematica.destroy')
    <form method="post" action="{{route('tematica.destroy',$thematic->id)}}">
        @method('DELETE')
        @csrf
        <button href="#" class="dropdown-item deleteConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar ">
            <i class="fa-solid fa-trash-can font-medium-2"></i>
        </button>
    </form>
    @endcan

</div>

