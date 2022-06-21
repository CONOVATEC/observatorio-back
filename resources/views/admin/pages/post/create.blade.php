@extends('layouts/contentLayoutMaster')
@section('title', 'Boletines')
@section('content')
<!-- Card Actions Section -->

<!-- Info table about actions -->
<div class="row ">
    <div class="col-12 ">
        <div class="card mb-1">
            <div class="card-header mb-0 py-0">
                <h4 class="card-title "> Registrar Nueva noticia</h4>
                <div class="heading-elements mt-1">
                    <ul class="list-inline">
                        <li class="">
                            <a href="{{ route('noticias.index') }}" type="button" class="form-control btn btn-danger btn-sm "><i class="fa-solid fa-hand-point-left"></i> Volver</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row match-height ">
    <!-- User Timeline Card -->
    <div class="col-lg-12 col-md-12 col-12 ">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <i data-feather="list" class="user-timeline-title-icon"></i>
                    <h5 class="mb-0 ms-1">Noticias</h5>
                </div>
                <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
            </div>
            <div class="card-body">
                {!! Form::open([ 'route' => 'noticias.store', 'method' => 'post','class' => 'form needs-validation','novalidate'=>'','autocomplete'=>'off' ]) !!}
                @include('admin.pages.post.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
   
</div>

<!--/ Info table about actions -->
<!--/ Card Actions Section -->

<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
	.create( document.querySelector( '#extract' ) )
	.then( editor => {
		console.log( 'Editor was initialized', editor );
	} )
	.catch( err => {
		console.error( err.stack );
	} );

    ClassicEditor
	.create( document.querySelector( '#content' ) )
	.then( editor => {
		console.log( 'Editor was initialized', editor );
	} )
	.catch( err => {
		console.error( err.stack );
	} );
</script>


@endsection



