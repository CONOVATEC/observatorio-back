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
                                    <th scope="col" class="">Titulo CMPJ
                                        <a wire:click="sortable('title_cmpj')">
                                            <span class="fa-solid fa{{ $camp === 'title_cmpj' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Desc.CMPJ
                                        <a wire:click="sortable('description_cmpj')">
                                            <span class="fa-solid fa{{ $camp === 'description_cmpj' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Titulo Asamblea
                                        <a wire:click="sortable('title_assembly')">
                                            <span class="fa-solid fa{{ $camp === 'title_assembly' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Desc. Asamblea
                                        <a wire:click="sortable('description_assembly')">
                                            <span class="fa-solid fa{{ $camp === 'description_assembly' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Titulo Directiva
                                        <a wire:click="sortable('title_directive')">
                                            <span class="fa-solid fa{{ $camp === 'title_directive' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Desc. Directiva
                                        <a wire:click="sortable('description_directive')">
                                            <span class="fa-solid fa{{ $camp === 'description_directive' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Link Video
                                        <a wire:click="sortable('link_video')">
                                            <span class="fa-solid fa{{ $camp === 'link_video' ? $icon : '-sort' }}"></span>
                                        </a>
                                    </th>
                                    <th scope="col">Link Drive
                                        <a wire:click="sortable('link_drive')">
                                            <span class="fa-solid fa{{ $camp === 'link_drive' ? $icon : '-sort' }}"></span>
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
                                    <td><span class="d-inline-block text-truncate" style="max-width: 550px;">{{ $values->title_cmpj }}</span></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 550px;">{{ $values->description_cmpj }}</span></td>
                                    <td class=""><span class="d-inline-block text-truncate" style="max-width: 550px;">{{ $values->title_assembly }}</span></td>

                                    <td><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->description_assembly }}</span></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 550px;">{{ $values->title_directive }}</span></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 250px;">{{ $values->description_directive }}</span></td>

                                    <td><span class="d-inline-block text-truncate" style="max-width: 550px;">{{ $values->link_video }}</span></td>
                                    <td><span class="d-inline-block text-truncate" style="max-width: 550px;">{{ $values->link_drive }}</span></td>
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

