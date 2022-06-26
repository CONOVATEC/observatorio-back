<div class="d-flex align-items-center col-actions">
    <form method="get" action="{{route('usuarios.restaurar',  $user->id)}}">
        @csrf
        <button href="#" class="dropdown-item restoreConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Restaurar ">
            <i class="fa-solid fa-check-to-slot font-medium-2 text-primary"></i>
        </button>
    </form>
    <form method="get" action="{{route('usuarios.eliminar.definitivo',  $user->id)}}">
        @csrf
        <button href="#" class="dropdown-item deleteDefinitiveConfirm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar definitivamente">
            <i class="fa-solid fa-ban text-danger font-medium-2 "></i>
        </button>
    </form>

</div>
