<div class="d-flex align-items-center col-actions">
    @can('noticias.edit')
    <a class="dropdown-item" href="{{ route('noticias.edit',$values->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
        <i class="fa-solid fa-pen-to-square font-medium-2 text-body"></i>
    </a>
    @endcan
    @can('noticias.destroy')
    <form method="post" action="{{route('noticias.destroy',$values)}}">
        @method('DELETE')
        @csrf
        <button href="#" class="dropdown-item deleteConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar ">
            <i class="fa-solid fa-trash-can font-medium-2"></i>
        </button>
    </form>
    @endcan
</div>
