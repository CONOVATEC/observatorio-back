<div class="d-flex align-items-center col-actions">
   @can('politicaJuvenil.edit')
    <a class="dropdown-item" href="{{ route('politicaJuvenil.edit',$youthPolicy)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
        <i class="fa-solid fa-pen-to-square font-medium-2 text-body"></i>
    </a>
    @endcan
    @can('politicaJuvenil.destroy')
    <form method="post" action="{{route('politicaJuvenil.destroy',$youthPolicy->id)}}">
        @method('DELETE')
        @csrf
        <button href="#" class="dropdown-item deleteConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar ">
            <i class="fa-solid fa-trash-can font-medium-2"></i>
        </button>
    </form>
    @endcan
</div>
