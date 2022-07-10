@extends('layouts/contentLayoutMaster')
@section('title', 'Logos')
@section('content')
<!-- Card Actions Section -->

<!-- Info table about actions -->
<div class="row ">
    <div class="col-12 ">
        <div class="card mb-1">
            <div class="card-header mb-0 py-0">
                <h4 class="card-title ">Nuevo Logo</h4>
                <div class="heading-elements mt-1">
                    <ul class="list-inline">
                        <li class="">
                            <a href="{{ route('logos.index') }}" type="button" class="form-control btn btn-danger btn-sm "><i class="fa-solid fa-hand-point-left"></i> Volver</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row match-height ">
    <!-- User Timeline Card -->
    <div class="col-lg-12 col-md-12 col-12 ">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <i data-feather="list" class="user-timeline-title-icon"></i>
                    <h5 class="mb-0 ms-1">Logo</h5>
                </div>
                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
            </div>
            <div class="card-body">
                {!! Form::open([ 'route' => 'logos.store', 'method' => 'post','files'=>true,'class' => 'form needs-validation',
                'autocomplete'=>'off' ]) !!}
                @include('admin.pages.logo.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>

<!--/ Info table about actions -->
<!--/ Card Actions Section -->
@endsection
