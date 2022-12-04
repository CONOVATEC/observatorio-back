@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
{{-- Page css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
    <div class="row match-height">
        <!-- Medal Card -->

        <div class="col-xl-4 col-md-6 col-12">
            <div class="card card-congratulation-medal">
                <div class="card-body">
                    <h5>Bienvenido 🎉 {{ auth()->user()->name }}!</h5>
                    <p class="card-text font-small-3">{{ auth()->user()->email }}</p>
                    <h3 class="mb-75 mt-2 pt-50">
                        {{-- /**********************************************************
                                 * Inicio para verificar el rol del usuario autentificado *
                                 **********************************************************/ --}}
                        @php
                        $roles = auth()
                        ->user()
                        ->getRoleNames();
                        // $roles = App\Models\User::with('roles')->get();
                        @endphp
                        @if (is_null($roles))
                        <a href="#">Sin rol</a>
                        @else
                        @forelse($roles as $role)
                        <a href="{{ route('roles.index') }}">{{ $role }}</a>
                        @empty
                        <a href="#">Sin rol</a>
                        @endforelse
                        @endif
                        {{-- /*******************************************************
                                 * Fin para verificar el rol del usuario autentificado *
                                 *******************************************************/ --}}
                    </h3>
                    <a href="{{ route('usuarios.show', Auth::user()->id) }}" type="button" class="btn btn-primary">Ver
                        perfil</a>
                    <img src="{{ asset('images/illustration/badge.svg') }}" class="congratulation-medal" alt="Medal Pic" />
                </div>
            </div>
        </div>
        <!--/ Medal Card -->

        <!-- Statistics Card -->
        <div class="col-xl-8 col-md-6 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">Estadística</h4>
                    <div class="d-flex align-items-center">
                        <p class="card-text font-small-2 me-25 mb-0">Actualizado diario</p>
                    </div>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                {{-- <a href="{{ route('categorias.index') }}"> --}}
                                <div class="avatar bg-light-primary me-2">
                                    <div class="avatar-content">
                                        <i data-feather='airplay' class="avatar-icon" onclick="location.href='noticias'"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $postsCount }}</h4>
                                    <p class=" card-text font-small-3 mb-0">Publicaciones</p>
                                </div>

                                {{-- </a> --}}
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-info me-2">
                                    <div class="avatar-content">
                                        <i data-feather='tag' class="avatar-icon" onclick="location.href='etiquetas'"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $tagsCount }}</h4>
                                    <p class="card-text font-small-3 mb-0">etiquetas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-danger me-2">
                                    <div class="avatar-content">
                                        <i data-feather='grid' class="avatar-icon" onclick="location.href='categorias'"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $categoriesCount }}</h4>
                                    <p class="card-text font-small-3 mb-0">Categorías</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-success me-2">
                                    <div class="avatar-content">
                                        <i data-feather='users' class="avatar-icon" onclick="location.href='usuarios'"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $usersCount }}</h4>
                                    <p class="card-text font-small-3 mb-0">Usuarios</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics Card -->
    </div>
    {{-- <div class="row match-height">
            <div class="col-lg-4 col-12">
                <div class="row match-height">
                    <!-- Bar Chart - Orders -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body pb-50">
                                <h6>Visitas</h6>
                                <h2 class="fw-bolder mb-1">8,760</h2>
                                <div id="statistics-order-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Bar Chart - Orders -->

                    <!-- Line Chart - Profit -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6>Interactividad</h6>
                                <h2 class="fw-bolder mb-1">5.800</h2>
                                <div id="statistics-profit-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Line Chart - Profit -->

                    <!-- Earnings Card -->
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="card earnings-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title mb-1">Interactividad</h4>
                                        <div class="font-small-2">4.545</div>
                                        <h5 class="mb-1">$455.56</h5>
                                        <p class="card-text text-muted font-small-2">
                                            <span class="fw-bolder">68.2%</span><span> more earnings than last month.</span>
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <div id="earnings-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Earnings Card -->
                </div>
            </div>

            <!-- Revenue Report Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-revenue-budget">
                    <div class="row mx-0">
                        <div class="col-md-8 col-12 revenue-report-wrapper">
                            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center me-2">
                                        <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                                        <span>Earning</span>
                                    </div>
                                    <div class="d-flex align-items-center ms-75">
                                        <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                                        <span>Expense</span>
                                    </div>
                                </div>
                            </div>
                            <div id="revenue-report-chart"></div>
                        </div>
                        <div class="col-md-4 col-12 budget-wrapper">
                            <div class="btn-group">
                                <button type="button"
                                    class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    2020
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">2020</a>
                                    <a class="dropdown-item" href="#">2019</a>
                                    <a class="dropdown-item" href="#">2018</a>
                                </div>
                            </div>
                            <h2 class="mb-25">$25,852</h2>
                            <div class="d-flex justify-content-center">
                                <span class="fw-bolder me-25">Budget:</span>
                                <span>56,800</span>
                            </div>
                            <div id="budget-chart"></div>
                            <button type="button" class="btn btn-primary">Increase Budget</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Revenue Report Card -->
        </div> --}}

    <div class="row match-height">
        <!-- Company Table Card -->
        <div class="col-lg-8 col-12">
            <div class="card card-company-table">
                <div class="card-header">
                    <p class="card-title">Últimos noticias publicadas</p>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Creado</th>
                                    @can('noticias.edit')
                                    <th>Detalle</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <span class="text-truncate d-block" style="max-width: 100px;">{{ $post->title }}</span>
                                    </td>
                                    <td class="">
                                        <span class="text-truncate d-block" style="max-width: 100px;"><span class="text-truncate d-block" style="max-width: 100px;">{{ $post->user->name }}</span
                                    </td>
                                    <td>{{ $post->created_at->format('d-m-Y ') }}</td>
                                    @can('noticias.edit')
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('noticias.edit',$post->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                        </div>
                                    </td>
                                    @endcan
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-d-flex align-items-center">Sin post</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $posts->links('vendor.pagination.simple-bootstrap-5') }}
                </div>
            </div>
        </div>
        <!--/ Company Table Card -->

        <!-- Developer Meetup Card -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-developer-meetup">
                <div class="meetup-img-wrapper rounded-top text-center">
                    <img src="{{ asset('images/illustration/email.svg') }}" alt="Meeting Pic" height="170" />
                </div>
                <div class="card-body">
                    <div class="meetup-header d-flex align-items-center">
                        <div class="meetup-day">
                            <h3 class="mb-0">{{ \carbon\Carbon::now()->formatLocalized('%d') }}</h3>
                            <h6 class="mb-0">{{ \carbon\Carbon::now()->formatLocalized('%B') }}</h6>
                            {{-- <h6 class="mb-0">{{ \carbon\Carbon::now()->formatLocalized('%d %B %Y %I:%M %p') }}</h6> --}}
                        </div>
                        <div class="my-auto">
                            <h4 class="card-title mb-25">{{ auth()->user()->name }}</h4>
                            <p class="card-text mb-0">{{ auth()->user()->username }}</p>
                        </div>
                    </div>
                    <p>Últimos Usuarios registrados</p>
                    <hr>
                    <div class="mt-0">
                        @forelse($users as $user)
                        <div class="avatar float-start bg-light-primary rounded me-1">
                            <div class="avatar-content">
                                <i data-feather="user" class="avatar-icon font-medium-3"></i>
                            </div>
                        </div>
                        <div class="more-info">
                            <h6 class="mb-0">{{ $user->username }}</h6>
                            <small>{{ \carbon\Carbon::now()->formatLocalized('%d %B %Y %I:%M %p') }}</small>
                        </div>
                        @empty
                        Sin usuarios
                        @endforelse
                    </div>
                    <div class="avatar-group">
                        @forelse($users as $user)
                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="{{ $user->name }}" class="avatar pull-up">
                            <img src="{{ $user->profile_photo_url }}" alt="Avatar" width="33" height="33" />
                        </div>
                        @empty
                        Sin usuarios
                        @endforelse
                        <h6 class="align-self-center cursor-pointer ms-50 mb-0">+{{ $usersCount - count($users) }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Developer Meetup Card -->

        <!-- Browser States Card -->
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-browser-states">
                <div class="card-header">
                    <div>
                        <h4 class="card-title">Categories</h4>
                        <p class="card-text font-small-2">Categorías populares</p>
                    </div>
                 </div>
                <div class="card-body">
                    @forelse($categoriesTop as $category)
                    <div class="browser-states">
                        <div class="d-flex ">
                            <div class="avatar-content ">
                                <i data-feather="layers" class="avatar-icon font-medium-3 mx-1"></i>
                            </div>
                            <h6 class="mb-0 ">{{ $category->name }}</h6>
                            <span class="badge rounded-pill bg-primary mx-2">{{ $category->posts_count }}</span>
                    </div>
                </div>
                @empty
                Sin categorías
                @endforelse
            </div>
        </div>
    </div>
    <!--/ Browser States Card -->

    <!-- Goal Overview Card -->
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card card-browser-states">
            <div class="card-header">
                <div>
                    <h4 class="card-title">Etiquetas</h4>
                    <p class="card-text font-small-2">Etiquetas populares</p>
                </div>
            </div>
            <div class="card-body">
                @forelse($tagsTop as $tag)
                <div class="browser-states">
                    <div class="d-flex">
                        <div class="avatar-content ">
                            <i data-feather="tag" class="avatar-icon font-medium-3 mx-1"></i>
                        </div>
                        <h6 class="align-self-center mb-0">{{ $tag->name }}</h6>
                        <span class="badge rounded-pill bg-success mx-2">{{ $tag->posts_count}}</span>
                    </div>
                </div>
                @empty
                Sin etiquetas
                @endforelse
            </div>
            {{-- @json($tagsTop) --}}
        </div>
    </div>
    <!--/ Goal Overview Card -->

    <!-- Transaction Card -->
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card card-browser-states">
            <div class="card-header">
                <div>
                    <h4 class="card-title">Noticias</h4>
                    <p class="card-text font-small-2">Noticias populares</p>
                </div>
            </div>
            <div class="card-body">
                @forelse($posts as $post)
                <div class="browser-states">
                    <div class="d-flex">
                        <div class="avatar-content ">
                            <i data-feather="globe" class="avatar-icon font-medium-3 mx-1"></i>
                        </div>
                        <h6 class="align-self-center mb-0">{{ $post->title }}</h6>
                    </div>
                </div>
                @empty
                Sin noticias
                @endforelse
            </div>
        </div>
    </div>
    <!--/ Transaction Card -->
    </div>
</section>
<!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
@endsection
