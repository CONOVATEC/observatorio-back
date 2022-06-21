@extends('layouts/contentLayoutMaster')
@section('title', 'Boletines')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @livewire('admin.post.live-post-table')

        </div>
    </div>


    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection
