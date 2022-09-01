<div class="card">
    <div class="card-header mt-1 mb-0 py-0">
        <h4 class="card-title">Estrategia Metropolitana</h4>
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
               @can('estrategiaMetropolitana.create')
                <li>
                    <a href="{{ route('estrategiaMetropolitana.create') }}" type="button" class="form-control btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>

                </li>
              @endcan

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

                                    <th scope="col" class="">link youtube
                                        <a wire:click="sortable('link_youtube')">
                                            <span class="fa-solid fa{{ $camp === 'link_youtube' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>

                                    <th scope="col" class="">link drive
                                        <a wire:click="sortable('link_drive')">
                                            <span class="fa-solid fa{{ $camp === 'link_drive' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>

                                    <th scope="col">imagen

                                    </th>

                                    <th scope="col">Creado
                                        <a wire:click="sortable('created_at')">
                                            <span class="fa-solid fa{{ $camp === 'created_at' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Actualizado
                                        <a wire:click="sortable('updated_at')">
                                            <span class="fa-solid fa{{ $camp === 'updated_at' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    @if(auth()->user()->can('estrategiaMetropolitana.edit') or auth()->user()->can('estrategiaMetropolitana.destroy') )
                                    <th scope="col" class="text-center">Acciones</th>
                                 @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($youthStrategies as $youthStrategy)
                                <tr>
                                    {{-- <td>{{ $category->id }}</td> --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $youthStrategy->name }}</span></td>
                                    <td class=""><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $youthStrategy->link_youtube }}</span></td>
                                    <td class=""><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $youthStrategy->link_drive }}</span></td>
                                    <td>
                                        @isset($youthStrategy->image)
                                    <img src="{{ Storage::url($youthStrategy->image->url) }}" class="img-thumbnail" style="width:100px"></td>
                                    @else
                                    <img src="" class="img-thumbnail" style="width:100px"></td>
                                    @endif
                                    <td><span class="badge rounded-pill badge-light-primary me-1">{{ $youthStrategy->created_at->format('d-m-Y') }}</span></td>
                                    <td><span class="badge rounded-pill badge-light-primary me-1">{{ $youthStrategy->updated_at->format('d-m-Y') }}</span></td>
                                  @if(auth()->user()->can('estrategiaMetropolitana.edit') or auth()->user()->can('estrategiaMetropolitana.destroy') )
                                    <td class="text-center">
                                        {{-- Incluimos los botones  --}}
                                        @include('admin.pages.youthStrategy.partials.buttons')
                                    </td>
                                   @endif
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
        @include('admin.pages.youthStrategy.partials.pagination')
    </div>

</div>
