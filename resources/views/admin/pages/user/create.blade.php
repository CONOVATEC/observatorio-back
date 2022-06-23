@extends('layouts/contentLayoutMaster')
@section('title', 'Usuarios')
@section('vendor-style')
<link rel="stylesheet" href="{{asset(mix('vendors/css/forms/select/select2.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/katex.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/monokai-sublime.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/editors/quill/quill.snow.css'))}}">

@endsection
@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/plugins/forms/form-quill-editor.css'))}}">
<link rel="stylesheet" type="text/css" href="{{asset(mix('css/base/pages/page-blog.css'))}}">
@endsection

@section('content')
<section class="invoice-edit-wrapper">
    <div class="row invoice-edit">
        {{-- Incluimos el formulario --}}
        {!! Form::open([ 'route' => 'usuarios.store', 'method' => 'post','class' => 'form needs-validation','novalidate'=>'','enctype' => 'multipart/form-data','id' =>'identifier']) !!}

        @include('admin.pages.user.partials.form')
        {!! Form::close() !!}

        {{-- @include('admin.pages.user.partials.form') --}}
    </div>

</section>
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/forms/select/select2.full.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/katex.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/highlight.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/editors/quill/quill.min.js'))}}"></script>
@endsection

@section('page-script')
<script src="{{asset(mix('js/scripts/pages/page-blog-edit.js'))}}"></script>
@endsection
