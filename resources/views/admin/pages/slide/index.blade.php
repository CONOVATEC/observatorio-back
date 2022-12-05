@extends('layouts/contentLayoutMaster')
@section('title', 'Slide Politica Juventud')
@section('content')

{{-- @include('admin.pages.slide.partials.alert') --}}
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('slide.index') or auth()->user()->can('slide.create') or auth()->user()->can('slide.destroy'))
            @livewire('admin.slide.slide-table')
            @endif
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
