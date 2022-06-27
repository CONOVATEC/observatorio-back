@extends('layouts/contentLayoutMaster')

@section('title', 'Usuario')

@section('vendor-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
{{-- Page Css files --}}
@endsection
@section('content')
<section class="app-user-view-account">
    <div class="row">
        <!-- User Sidebar -->
        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
            <!-- User Card -->
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mt-3 mb-2" src="{{ Auth::user() ? $user->profile_photo_url : asset('images/portrait/small/avatar-s-11.jpg') }}" height="200" width="200" alt="{{ $user->username }}" title="{{ $user->username }}" />
                            <div class="user-info text-center">
                                <h4>{{ $user->name }}</h4>
                                @forelse($user->roles as $key => $role)
                                <span class="badge bg-light-success">{{ $role->name }} </span>
                                @empty
                                <span class="badge bg-light-secondary">Sin rol </span>
                                @endforelse

                            </div>
                        </div>
                    </div>

                    <h4 class="fw-bolder border-bottom mt-2 pb-50 mb-1">{{ __('Information') }}</h4>
                    <div class="info-container">
                        <ul class="list-unstyled">
                            <li class="mb-75">
                                <span class="fw-bolder me-25">{{ __('Username') }}:</span>
                                <span>{{ $user->username }}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">{{ __('Email') }}:</span>
                                <span>{{ $user->email }}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">{{ __('Status') }}:</span>
                                @if ($user->status =='1')
                                <span class="badge bg-light-warning">Inactivo </span>
                                @elseif($user->status =='2')
                                <span class="badge bg-light-primary">Activo</span>
                                @else
                                <span class="badge bg-light-danger">Eliminado </span>
                                @endif
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">{{ __('Role') }}:</span>
                                @forelse($user->roles as $key => $role)
                                <span class="badge bg-light-primary">{{ $role->name }} </span>
                                @empty
                                <span class="badge bg-light-primary">Sin rol </span>
                                @endforelse
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">{{ __('Registration date') }}</span>
                                <span>{{ $user->created_at->isoFormat('DD, MMMM  YYYY')}}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">{{ __('Cell No.') }}:</span>
                                <span>+51-{{ $user->phone }}</span>
                            </li>
                            <li class="mb-75">
                                <span class="fw-bolder me-25">{{ __('Biography') }}:</span>
                                <span>{{ $user->biography }}</span>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center pt-2">
                            <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-primary me-1">
                                {{ __('Edit') }}
                            </a>
                            <a href="{{ route('logout') }}" class="btn btn-outline-danger suspend-user">{{ __('Logout') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card -->
        </div>
        <!--/ User Sidebar -->

        <!-- User Content -->
        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
            <!-- User Pills -->
            <ul class="nav nav-pills mb-2">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('usuarios.show',$user->id) }}">
                        <i data-feather="user" class="font-medium-3 me-50"></i>
                        <span class="fw-bold">{{ __('Manage Account') }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">
                        <i data-feather="bell" class="font-medium-3 me-50"></i><span class="fw-bold">{{ __('Notifications') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('usuarios.index')}}">
                        <i data-feather="user" class="font-medium-3 me-50"></i><span class="fw-bold">{{ __('Users') }}</span>
                    </a>
                </li>
            </ul>
            <!--/ User Pills -->

            <!-- Project table -->
            <div class="card">
                <h4 class="card-header">{{ __('Publicaciones de Usuario') }}</h4>
                <div class="table-responsive">
                    <table class="table datatable-project">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>{{ __('Post') }}</th>
                                <th class="text-nowrap">{{ __('Status') }}</th>
                                <th>{{ __('Registration date') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $key => $post)
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td class="text-center">
                                @if ($post->status =='1')
                                <span class="badge bg-light-danger">Inactivo </span>
                                @else
                                <span class="badge bg-light-success">Activo </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <span>{{ $post->created_at->isoFormat('DD, MMMM  YYYY')}}</span>
                            </td>
                            <td class="text-center">
                                <a class="dropdown-item" href="{{ route('usuarios.edit',$user->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar post">
                                    <i class="fa-solid fa-pen-to-square font-medium-2 text-body"></i>
                                </a>
                            </td>
                            @empty
                            <td colspan="5" class="text-center">
                                Sin publicaciones
                            </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Project table -->

            <!-- Activity Timeline -->
            <div class="card">
                <h4 class="card-header">{{ __('User Activity Timeline') }}</h4>
                <div class="card-body pt-1">
                    <ul class="timeline ms-50">
                        {{-- @json($activities) --}}
                        @forelse($activities as $key => $activity)
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>{{ $activity->description }}</h6>
                                    <span class="timeline-event-time me-1">{{ $activity->created_at->diffForHumans() }}</span>
                                </div>
                                <p>{{ \carbon\Carbon::now()->isoFormat('DD MMMM  YYYY, h:mm a') }}</p>
                            </div>
                        </li>
                        @empty
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6> Sin actividad</h6>
                                    <span class="timeline-event-time me-1">{{ \carbon\Carbon::now()->diffForHumans() }}</span>
                                </div>
                                <p>{{ \carbon\Carbon::now()->isoFormat('DD MMMM  YYYY, h:mm a') }}</p>


                            </div>
                        </li>

                        @endforelse
                    </ul>
                </div>
            </div>
            <!-- /Activity Timeline -->
        </div>
        <!--/ User Content -->
    </div>
</section>

{{-- @include('content/_partials/_modals/modal-edit-user')
@include('content/_partials/_modals/modal-upgrade-plan') --}}
@endsection

@section('vendor-script')
{{-- Vendor js files --}}

{{-- data table --}}

<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
@endsection
@section('page-script')
{{-- Page js files --}}
@endsection
