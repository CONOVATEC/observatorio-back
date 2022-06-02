@extends('layouts/contentLayoutMaster')
@section('title', 'Categorías')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @livewire('admin.category.live-category-table')

        </div>
    </div>
    <!--/ Info table about actions -->

</section>
<!--/ Card Actions Section -->

@endsection
