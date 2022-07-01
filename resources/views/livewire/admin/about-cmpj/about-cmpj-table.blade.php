<div class="card">
    <div class="card-header mt-1 mb-0 py-0">
        <h4 class="card-title">Listado </h4>
        <div class="heading-elements py-0">
            <ul class="list-inline">
                
                <li>
                    <a href="{{ route('sobreCmpj.create') }}" type="button" class="form-control btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>

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
                                    <th scope="col" class="">Ordenaza
                                        <a wire:click="sortable('ordinance')">
                                            <span class="fa-solid fa{{ $camp === 'ordinance' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Nosotros
                                        <a wire:click="sortable('about_us')">
                                            <span class="fa-solid fa{{ $camp === 'about_us' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Visión
                                        <a wire:click="sortable('vision')">
                                            <span class="fa-solid fa{{ $camp === 'vision' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Funciones
                                        <a wire:click="sortable('functions')">
                                            <span class="fa-solid fa{{ $camp === 'functions' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Jefatura de Directores
                                        <a wire:click="sortable('board_of_directors')">
                                            <span class="fa-solid fa{{ $camp === 'board_of_directors' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Social
                                        <a wire:click="sortable('social')">
                                            <span class="fa-solid fa{{ $camp === 'social' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($aboutCmpj as $values)
                                <tr>
                                     <td>{{ $values->id }}</td> 
                                    {{--<td>{{ $loop->iteration }}</td>--}}
                                    <td><span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $values->ordinance }}</span></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->about_us }}</span></td>
                                    <td class=""><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->vision }}</span></td>
                                    
                                    <td><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->functions }}</span></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->board_of_directors }}</span></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->social }}</span></td>
                                    <td class="text-center">
                                        {{-- Incluimos los botones  --}}
                                        @include('admin.pages.aboutCmpj.partials.buttons')
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

