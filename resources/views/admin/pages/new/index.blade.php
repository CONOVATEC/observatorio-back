@extends('layouts/contentLayoutMaster')
@section('title', 'Noticias')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Listado de noticias</h4>
                    <div class="heading-elements py-0">
                        <ul class="list-inline">
                            <li>
                                <div class="input-group ">
                                    <input type="text" class="form-control " placeholder="Buscar..." aria-label="Buscar..." aria-describedby="buscar" />
                                    <span class="input-group-text" id="buscar"><i data-feather="search"></i></span>
                                </div>
                            </li>
                            <li>
                                <button type="button" class="btn btn-primary "><i class="fa-solid fa-circle-plus"></i> Nuevo</button>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Icon</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Collapse</td>
                                                <td class="text-center">
                                                    <i data-feather="chevron-down"></i>
                                                </td>
                                                <td>Collapse card content using collapse action.</td>
                                            </tr>
                                            <tr>
                                                <td>Refresh Content</td>
                                                <td class="text-center">
                                                    <i data-feather="rotate-cw"></i>
                                                </td>
                                                <td>Refresh your card content using refresh action.</td>
                                            </tr>
                                            <tr>
                                                <td>Remove Card</td>
                                                <td class="text-center">
                                                    <i data-feather="x"></i>
                                                </td>
                                                <td>Remove card from page using remove card action</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Info table about actions -->

</section>
<!--/ Card Actions Section -->

@endsection
