<div class="btn-group" role="group">
    <div class="d-flex align-items-center justify-content-center col-actions">
        <a class="dropdown-item" href="{{ route('usuarios.show',$user->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver perfil">
            <i class="fa-solid fa-eye font-medium-2 text-body" ></i>
        </a>
        <a class="dropdown-item" href="{{ route('usuarios.edit',$user->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
            <i class="fa-solid fa-pen-to-square font-medium-2 text-body"></i>
        </a>
        <form method="post" action="{{route('usuarios.destroy',$user->id)}}">
            @method('DELETE')
            @csrf
            <button href="#" class="dropdown-item deleteConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar ">
                <i class="fa-solid fa-trash-can font-medium-2"></i>
            </button>
        </form>
    </div>
</div>
