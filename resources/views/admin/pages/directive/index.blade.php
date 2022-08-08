@extends('layouts/contentLayoutMaster')
@section('title', 'Directivos')
@section('content')
@include('admin.pages.post.partials.alert')
<!-- Card Actions Section -->
<section id="card-actions">

    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
           @livewire('admin.directive.directive-table')
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



