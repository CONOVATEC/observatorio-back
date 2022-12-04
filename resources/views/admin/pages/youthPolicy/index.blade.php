@extends('layouts/contentLayoutMaster')
@section('title', 'Politica Juventud')
@section('content')

{{-- @include('admin.pages.typeLogo.partials.alert') --}}
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('politicaJuvenil.index') or auth()->user()->can('politicaJuvenil.create') or auth()->user()->can('politicaJuvenil.destroy'))
            @livewire('admin.youth-policy.youth-policy-table')
            @endif
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
