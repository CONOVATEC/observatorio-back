@extends('layouts/contentLayoutMaster')
@section('title', 'Observatorio Juvenil')
@section('content')

@include('admin.pages.youthObservatory.partials.alert')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
        @if(auth()->user()->can('observatorioJuvenil.index') or auth()->user()->can('observatorioJuvenil.create') or auth()->user()->can('observatorioJuvenil.destroy'))
            @livewire('admin.youth-observatory.youth-observatory-table')
            @endif
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
