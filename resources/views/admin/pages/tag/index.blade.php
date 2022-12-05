@extends('layouts/contentLayoutMaster')
@section('title', 'Etiquetas')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('etiquetas.index') or auth()->user()->can('etiquetas.create') or auth()->user()->can('etiquetas.destroy'))
            @livewire('admin.tag.live-tag-table')
            @endif
        </div>
    </div>
    {{--  Para listar la lista de categorías eliminados por el Usuario que pueden ser restaurados  --}}
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('etiquetas.eliminar.definitivo') or auth()->user()->can('etiquetas.restaurar') )
            @livewire('admin.tag.restore-tag-table')
            @endif
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection


@section('vendor-script')

@if(Session::has('success'))

@endif

@endsection
