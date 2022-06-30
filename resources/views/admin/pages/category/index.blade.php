@extends('layouts/contentLayoutMaster')
@section('title', 'Categorías')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('categorias.index') or auth()->user()->can('categorias.create') or auth()->user()->can('categorias.destroy'))
            @livewire('admin.category.live-category-table')
            @endif
        </div>
    </div>
    {{-- Para listar la lista de categorías eliminados por el Usuario que pueden ser restaurados  --}}
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('categorias.eliminar.definitivo') or auth()->user()->can('categorias.restaurar') )
            @livewire('admin.category.restore-category-table')
            @endif
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
@section('vendor-script')

@endsection
