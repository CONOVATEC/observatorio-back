@extends('layouts/contentLayoutMaster')
@section('title', 'Políticas')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @livewire('admin.policy.live-policy-table')
        </div>
    </div>
    {{--  Para listar la lista de politicas eliminados por el Usuario que pueden ser restaurados  --}}
    <div class="row">
        <div class="col-12">
            {{-- nuevo --}}
            @livewire('admin.policy.restore-policy-table')
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
@section('vendor-script')

@endsection
