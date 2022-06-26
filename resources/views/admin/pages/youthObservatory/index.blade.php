@extends('layouts/contentLayoutMaster')
@section('title', 'Observatorio Nosotros')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @livewire('admin.youth-observatory.youth-observatory-table')
        </div>
    </div>
    {{--  Para listar la lista de categorías eliminados por el Usuario que pueden ser restaurados  --}}
    <div class="row">
        <div class="col-12">
            @livewire('admin.youth-observatory.restore-youth-observatory-table')
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
