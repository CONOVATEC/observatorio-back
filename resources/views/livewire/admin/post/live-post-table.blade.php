<div class="card">
    <div class="card-header mt-1 mb-0 py-0">
        <h4 class="card-title">Listado de Noticias</h4>
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
                <li>
                    <a href="{{ route('noticias.create') }}" type="button" class="form-control btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>

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
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 10%" class="ps-1">Item

                                        {{-- <a role="button" class="float-end" href="#" wire:click="sortable('id')"><span class="fa-solid fa{{ $camp === 'id' ? $icon : '-sort' }}"></span></a> --}}
                                        <a wire:click="sortable('id')">
                                            <span class="fa-solid fa{{ $camp === 'id' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col" class="">Título
                                        <a wire:click="sortable('title')">
                                            <span class="fa-solid fa{{ $camp === 'title' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Estado
                                        <a wire:click="sortable('statug')">
                                            <span class="fa-solid fa{{ $camp === 'statug' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Categoria
                                        <a wire:click="sortable('category_id')">
                                            <span class="fa-solid fa{{ $camp === 'category_id' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Usuario
                                        <a wire:click="sortable('user_id')">
                                            <span class="fa-solid fa{{ $camp === 'user_id' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Creado
                                        <a wire:click="sortable('created_at')">
                                            <span class="fa-solid fa{{ $camp === 'created_at' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $values)
                                <tr class="text-center">
                                    {{-- <td>{{ $category->id }}</td> --}}
                                    <td><span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $values->id }}</span></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $values->title }}</span></td>
                                    <td class="text-center">
                                       
                                        @if ($values->status==2)
                                        <span class="d-inline-block text-truncate badge badge-glow bg-success" style="max-width: 250px;">Publicado</span>
                                        @else
                                            <span class="d-inline-block text-truncate badge badge-glow bg-danger" style="max-width: 250px;">Por Publicar</span>
                                        @endif
                                        
                                    </td>
                                    <td class=""><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->category->name }}</span></td>
                                    <td class=""><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->user->name }}</span></td>
                                    <td class=""><span class="badge rounded-pill badge-light-danger me-1" style="max-width: 250px;">{{ $values->created_at->format('d-m-Y') }}</span></td>
                                    <td class="text-center">
                                        {{-- Incluimos los botones  --}}
                                        @include('admin.pages.post.partials.buttons')
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center ">
                                    <td colspan="5" class="text-danger">No existe registro</td>
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
        @include('admin.pages.post.partials.pagination')
    </div>

</div>
