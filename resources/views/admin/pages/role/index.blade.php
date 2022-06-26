@extends('layouts/contentLayoutMaster')
@section('title', 'Roles')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <p class="mb-2">
        Un rol proporcionaba acceso a menús y funciones predefinidos para que, dependiendo
        en el rol asignado, un administrador puede tener acceso a lo que necesita
    </p>
    <div class="row">
        @forelse($roles as $role)
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span>Total 4 usuarios</span>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" src="{{asset('images/avatars/2.png')}}" alt="Avatar" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Allen Rieske" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" src="{{asset('images/avatars/12.png')}}" alt="Avatar" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Julee Rossignol" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" src="{{asset('images/avatars/6.png')}}" alt="Avatar" />
                            </li>
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                <img class="rounded-circle" src="{{asset('images/avatars/11.png')}}" alt="Avatar" />
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                        <div class="role-heading">
                            <h4 class="fw-bolder">{{ $role->name }}</h4>
                            <a href="{{ route('roles.edit',$role) }}" class="role-edit-modal">
                                <small class="fw-bolder">Editar Rol</small>
                            </a>
                        </div>
                        <a href="{{ route('roles.permisos.administrar', $role->id) }}" class="text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Asignar permisos">
                            <i data-feather='shield' class="font-medium-5"></i>Permisos

                        </a>

                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end justify-content-center h-100">
                            <img src="{{asset('images/illustration/faq-illustrations.svg')}}" class="img-fluid mt-2" alt="Image" width="85" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <a href="{{ route('roles.create') }}" class="stretched-link text-nowrap add-new-role">
                                <span class="btn btn-primary mb-1">Crear nuevo rol</span>
                            </a>
                            <p class="mb-0">Agregar rol, si no existe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforelse
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end justify-content-center h-100">
                            <img src="{{asset('images/illustration/faq-illustrations.svg')}}" class="img-fluid mt-2" alt="Image" width="85" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <a href="{{ route('roles.create') }}" class="stretched-link text-nowrap add-new-role">
                                <span class="btn btn-primary mb-1">Crear nuevo rol</span>
                            </a>
                            <p class="mb-0">Agregar rol, si no existe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            @livewire('admin.role.live-role-table')
        </div>
    </div>
    {{-- Para listar la lista de categorías eliminados por el Usuario que pueden ser restaurados  --}}


    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
@section('vendor-script')
<script>

</script>
@endsection
