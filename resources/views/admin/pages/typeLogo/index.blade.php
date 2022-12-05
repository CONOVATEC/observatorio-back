@extends('layouts/contentLayoutMaster')
@section('title', 'Tipo de Logos')
@section('content')

{{-- @include('admin.pages.typeLogo.partials.alert') --}}
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('tipoLogo.index') or auth()->user()->can('tipoLogo.create') or auth()->user()->can('tipoLogo.destroy'))
            @livewire('admin.type-logo.type-logo-table')
            @endif
            {{-- @endif --}}
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
@section('vendor-script')

@endsection
