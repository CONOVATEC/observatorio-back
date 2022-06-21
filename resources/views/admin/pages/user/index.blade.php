@extends('layouts/contentLayoutMaster')
@section('title', 'Usuarios')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mt-1 mb-0 py-0">
                    <h4 class="card-title">Listado de Usuarios</h4>
                    <div class="heading-elements py-0">
                        <ul class="list-inline">
                            <li>
                                <div class="input-group ">
                                    <input type="text" class="form-control " placeholder="Buscar..." aria-label="Buscar..." aria-describedby="buscar" wire:model="search" />
                                </div>
                            </li>
                            <li class="mx-1">
                                <select class="form-select me-1 form-select-sm " wire:model="perPage" style="padding-top: 5px;padding-bottom: 6px;">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    {{-- <option value="todos">Todos</option>  --}}
                                </select>
                            </li>
                            <li>
                                <button type="button" class="form-control btn btn-danger btn-sm " wire:click="clear"><i class="fa-solid fa-arrows-rotate"></i> Limpiar</button>
                            </li>
                            <li><a href="{{ route('categorias.create') }}" type="button" class="form-control btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="table-responsive ">
								<livewire:admin.user.live-user-table theme="bootstrap-5" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Para listar la lista de categorías eliminados por el Usuario que pueden ser restaurados  --}}
    <div class="row">
        <div class="col-12">
            {{-- @livewire('admin.category.restore-category-table')  --}}
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
