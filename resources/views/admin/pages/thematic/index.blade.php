@extends('layouts/contentLayoutMaster')
@section('title', 'Tematica')
@section('content')

{{-- @include('admin.pages.typeLogo.partials.alert') --}}
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('tematica.index') or auth()->user()->can('tematica.create') or auth()->user()->can('tematica.destroy'))
            @livewire('admin.thematic.thematic-table')
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
