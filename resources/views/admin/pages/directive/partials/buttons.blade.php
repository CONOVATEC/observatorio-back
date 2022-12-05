<div class="d-flex align-items-center col-actions">
    @can('directives.edit')
    <a class="dropdown-item" href="{{ route('directives.edit',$directive) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
        <i class="fa-solid fa-pen-to-square font-medium-2 text-body"></i>
    </a>
    @endcan
    @can('directives.destroy')
    <form method="post" action="{{route('directives.destroy',$directive->id)}}">
        @method('DELETE')
        @csrf
        <button href="#" class="dropdown-item deleteConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar ">
            <i class="fa-solid fa-trash-can font-medium-2"></i>
        </button>
    </form>
    @endcan
</div>
