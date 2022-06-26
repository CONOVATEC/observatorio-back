@extends('layouts/contentLayoutMaster')

@section('title', 'Usuario')

@section('vendor-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
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
                            <img class="img-fluid rounded mt-3 mb-2" src="{{asset('storage/'.$user->profile_photo_path)}}" height="200" width="200" alt="{{ $user->username }}" title="{{ $user->username }}" />
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
                    {{-- <div class="d-flex justify-content-around my-2 pt-75">
                        <div class="d-flex align-items-start me-2">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="check" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h4 class="mb-0">1.23k</h4>
                                <small>Tasks Done</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="briefcase" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h4 class="mb-0">568</h4>
                                <small>Projects Done</small>
                            </div>
                        </div>
                    </div> --}}
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
                                <span class="badge bg-light-secondary">{{ $role->name }} </span>
                                @empty
                                <span class="badge bg-light-secondary">Sin rol </span>
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
                    <a class="nav-link" href="{{asset('app/user/view/notifications')}}">
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
                                <th></th>
                                <th>Publicación</th>
                                <th class="text-nowrap">Cantidad</th>
                                <th>Fecha</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- /Project table -->

            <!-- Activity Timeline -->
            <div class="card">
                <h4 class="card-header">{{ __('User Activity Timeline') }}</h4>
                <div class="card-body pt-1">
                    <ul class="timeline ms-50">
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>User login</h6>
                                    <span class="timeline-event-time me-1">12 min ago</span>
                                </div>
                                <p>User login at 2:12pm</p>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>Meeting with john</h6>
                                    <span class="timeline-event-time me-1">45 min ago</span>
                                </div>
                                <p>React Project meeting with john @10:15am</p>
                                <div class="d-flex flex-row align-items-center mb-50">
                                    <div class="avatar me-50">
                                        <img src="{{asset('images/portrait/small/avatar-s-7.jpg')}}" alt="Avatar" width="38" height="38" />
                                    </div>
                                    <div class="user-info">
                                        <h6 class="mb-0">Leona Watkins (Client)</h6>
                                        <p class="mb-0">CEO of pixinvent</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>Create a new react project for client</h6>
                                    <span class="timeline-event-time me-1">2 day ago</span>
                                </div>
                                <p>Add files to new design folder</p>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>Create Invoices for client</h6>
                                    <span class="timeline-event-time me-1">12 min ago</span>
                                </div>
                                <p class="mb-0">Create new Invoices and send to Leona Watkins</p>
                                <div class="d-flex flex-row align-items-center mt-50">
                                    <img class="me-1" src="{{asset('images/icons/pdf.png')}}" alt="data.json" height="25" />
                                    <h6 class="mb-0">Invoices.pdf</h6>
                                </div>
                            </div>
                        </li>
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
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
{{-- data table --}}
<script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection
