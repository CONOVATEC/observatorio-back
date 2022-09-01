@extends('layouts/contentLayoutMaster')
@section('title', 'Estrategia Metropolitana')
@section('content')

@include('admin.pages.youthStrategy.partials.alert')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
        @if(auth()->user()->can('estrategiaMetropolitana.index') or auth()->user()->can('estrategiaMetropolitana.create') or auth()->user()->can('estrategiaMetropolitana.destroy'))
            @livewire('admin.youth-strategy.youth-strategy-table')
            @endif
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
