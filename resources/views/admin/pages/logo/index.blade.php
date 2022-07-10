@extends('layouts/contentLayoutMaster')
@section('title', 'Logos')
@section('content')
@include('admin.pages.post.partials.alert')
<!-- Card Actions Section -->
<section id="card-actions">

    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
           @livewire('admin.logo.logo-table')
        </div>
    </div>
    {{--  Para listar la lista de categorías eliminados por el Usuario que pueden ser restaurados  --}}
   <!-- <div class="row">
        <div class="col-12">

        </div>
    </div>  -->

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection



