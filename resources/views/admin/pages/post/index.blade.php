@extends('layouts/contentLayoutMaster')
@section('title', 'Boletines')
@section('content')
<!-- Card Actions Section -->
@include('admin.pages.post.partials.alert')

<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @livewire('admin.post.live-post-table')

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @livewire('admin.post.restore-post-table')
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->


@endsection
