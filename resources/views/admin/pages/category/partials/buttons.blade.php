<div class="d-flex align-items-center col-actions">
    <form method="POST" action=" {{ route('categorias.destroy',  $category->id) }} ">
        <a class="dropdown-item" href="{{ route('categorias.edit',$category) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
            <i class="fa-solid fa-pen-to-square font-medium-2 text-body"></i>
            {{-- <span>Editar</span> --}}
        </a>
        @csrf
        @method('DELETE')
        <button class="dropdown-item" onclick="return confirm('Are you sure?')" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
            <i class="fa-solid fa-trash-can font-medium-2 text-body"></i>
            {{-- <span class="font-medium-2 text-body"></span> --}} {{--
        <span>Editar</span> --}}
        </button>
    </form>

</div>
