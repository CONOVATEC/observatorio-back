<div class="d-flex align-items-center col-actions">
        
    <a class="dropdown-item" href="{{ route('juvenilesObservatorio.edit',$values->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
        <i class="fa-solid fa-pen-to-square font-medium-2 text-body"></i>
    </a>
   
    <form method="post" action="{{route('juvenilesObservatorio.destroy',$values->id)}}">
        @method('DELETE')
        @csrf
        <button href="#" class="dropdown-item deleteConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar ">
            <i class="fa-solid fa-trash-can font-medium-2"></i>
        </button>
    </form>
</div>
