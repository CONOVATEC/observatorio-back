@extends('layouts/contentLayoutMaster')
@section('title', 'Posiciones')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('posiciones.index') or auth()->user()->can('posiciones.create') or auth()->user()->can('posiciones.destroy'))
            @livewire('admin.position.live-position-table')
            @endif
        </div>
    </div>
    {{--  Para listar la lista de categorías eliminados por el Usuario que pueden ser restaurados  --}}
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('posiciones.eliminar.definitivo') or auth()->user()->can('posiciones.restaurar') )
            @livewire('admin.position.restore-position-table')
            @endif
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection


@section('vendor-script')



@endsection
