<div class="card">
    <div class="card-header mt-1 mb-0 py-0">
        <h4 class="card-title">Listado </h4>
        <div class="heading-elements py-0">
            <ul class="list-inline">
                
                <li>
                    <a href="{{ route('juvenilesObservatorio.create') }}" type="button" class="form-control btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>

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
                                    <th scope="col" class="">Misión
                                        <a wire:click="sortable('mission')">
                                            <span class="fa-solid fa{{ $camp === 'mission' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Visión
                                        <a wire:click="sortable('vision')">
                                            <span class="fa-solid fa{{ $camp === 'vision' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Nosotros
                                        <a wire:click="sortable('about_ud')">
                                            <span class="fa-solid fa{{ $camp === 'about_ud' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Organización
                                        <a wire:click="sortable('organization_chart')">
                                            <span class="fa-solid fa{{ $camp === 'organization_chart' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($youthObservatory as $values)
                                <tr>
                                     <td>{{ $values->id }}</td> 
                                    {{--<td>{{ $loop->iteration }}</td>--}}
                                    <td><span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $values->mission }}</span></td>
                                    <td class=""><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->vision }}</span></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->about_us }}</span></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->organization_chart }}</span></td>
                                    <td class="text-center">
                                        {{-- Incluimos los botones  --}}
                                        @include('admin.pages.youthObservatory.partials.buttons')
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
       {{-- @include('admin.pages.category.partials.pagination')-- sin uso--}}
    </div>

</div>
