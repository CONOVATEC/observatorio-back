@extends('layouts/contentLayoutMaster')
@section('title', 'Permisos')
@section('content')
<!-- Card Actions Section -->

<!-- Info table about actions -->
<div class="row ">
    <div class="col-12 ">
        <div class="card mb-1">
            <div class="card-header mb-0 py-0">
                <h4 class="card-title ">Permisos de Rol</h4>
                <div class="heading-elements mt-1">
                    <ul class="list-inline">
                        <li class="">
                            <a href="{{ route('roles.index') }}" type="button" class="form-control btn btn-danger btn-sm "><i class="fa-solid fa-hand-point-left"></i> Volver</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row match-height ">
    <!-- User Timeline Card -->
    <div class="col-12 col-lg-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <i data-feather="list" class="user-timeline-title-icon"></i>
                    <h5 class="mb-0 ms-1">Permisos</h5>
                </div>
                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
            </div>
            <div class="card-body">
                {!! Form::model($role,[ 'route' => ['roles.permisos.actualizar',$role], 'method' => 'put','class' => 'form needs-validation','novalidate'=>'' ]) !!}
                @include('admin.pages.role.partials.form-permission')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Roles creados</h5>
                </div>
                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
            </div>
            <div class="card-body ">
                <div class="d-flex justify-content-between overflow-auto">
                    <ul class="list-group list-group-flush">
                        @forelse($roles as $role)
                        {{-- @json($role) --}}
                        <li class="list-group-item"><a href="{{ route('roles.permisos.administrar',$role->id) }}">{{ $role->name }}</a></li>
                        @empty
                        <h5 class="mb-0">Sin registros</h5>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="card-footer overflow-auto d-flex justify-content-center">
                <small class="text-muted">{{$roles->withQueryString()->links('pagination::simple-bootstrap-5')}}</small>
            </div>
        </div>
    </div>

</div>

<!--/ Info table about actions -->
<!--/ Card Actions Section -->
@endsection
