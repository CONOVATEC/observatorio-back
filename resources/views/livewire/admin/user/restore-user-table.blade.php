<div class="card">
    <div class="card-header mt-1 mb-0 py-0">
        <h4 class="card-title">Listado de usuarios eliminados</h4>
        <div class="heading-elements py-0">
            <ul class="list-inline">
                <li>
                    <div class="input-group ">
                        <input type="text" class="form-control " placeholder="Buscar..." aria-label="Buscar..." aria-describedby="buscar" wire:model="search" />
                        {{-- <span class="input-group-text" id="buscar"><i data-feather="search"></i></span>  --}}
                    </div>
                </li>
                <li class="mx-1">
                    <select class="form-select me-1 form-select-sm " wire:model="perPage" style="padding-top: 5px;padding-bottom: 6px;">
                        <option value="3">3</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        {{-- <option value="todos">Todos</option>  --}}
                    </select>
                </li>
                <li>
                    <button type="button" class="form-control btn btn-danger btn-sm " wire:click="clear"><i class="fa-solid fa-arrows-rotate"></i> Limpiar</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show ">
        <div class="card-body ">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="table-responsive ">
                        <table class="table table-striped " style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10%" class="ps-1">Item

                                        {{-- <a role="button" class="float-end" href="#" wire:click="sortable('id')"><span class="fa-solid fa{{ $camp === 'id' ? $icon : '-sort' }}"></span></a> --}}
                                        <a wire:click="sortable('id')">
                                            <span class="fa-solid fa{{ $camp === 'id' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col" class="">Nombre
                                        <a wire:click="sortable('name')">
                                            <span class="fa-solid fa{{ $camp === 'name' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Correo electrónico
                                        <a wire:click="sortable('email')">
                                            <span class="fa-solid fa{{ $camp === 'email' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Eliminado
                                        <a wire:click="sortable('deleted_at')">
                                            <span class="fa-solid fa{{ $camp === 'deleted_at' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @json($categoriesEliminated)  --}}
                                @forelse($users as $user)
                                <tr>
                                    {{-- <td>{{ $user->id }}</td> --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $user->name }}</span></td>
                                    <td class=""><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $user->email }}</span></td>
                                    <td><span class="badge rounded-pill badge-light-danger me-1">{{ $user->deleted_at->format('d-m-Y') }}</span></td>
                                    <td class="text-center">
                                        {{-- Incluimos los botones  --}}
                                        @if(auth()->user()->can('usuarios.restaurar') or auth()->user()->can('usuarios.eliminar.definitivo') )
                                        @include('admin.pages.user.partials.buttons-restore')
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center ">
                                    <td colspan="5" class="text-danger">No existe registro eliminado</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        {{-- Incluimos la paginación personalizada  --}}
        @include('admin.pages.user.partials.pagination-restore')
    </div>

</div>
