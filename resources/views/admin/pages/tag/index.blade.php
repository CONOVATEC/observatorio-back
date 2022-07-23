@extends('layouts/contentLayoutMaster')
@section('title', 'Etiquetas')
@section('content')
<!-- Card Actions Section -->
<section id="card-actions">
    <!-- Info table about actions -->
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('etiquetas.index') or auth()->user()->can('etiquetas.create') or auth()->user()->can('etiquetas.destroy'))
            @livewire('admin.tag.live-tag-table')
            @endif
        </div>
    </div>
    {{--  Para listar la lista de categorías eliminados por el Usuario que pueden ser restaurados  --}}
    <div class="row">
        <div class="col-12">
            @if(auth()->user()->can('etiquetas.eliminar.definitivo') or auth()->user()->can('etiquetas.restaurar') )
            @livewire('admin.tag.restore-tag-table')
            @endif
        </div>
    </div>

    <!--/ Info table about actions -->
</section>
<!--/ Card Actions Section -->
@endsection


@section('vendor-script')

@if(Session::has('success'))
<script>

$(window).on("load", function () {
    "use strict";

    // On load Toast
    setTimeout(
        function () {
            toastr["success"]("{{ session('success') }}", "💪 Excelente!", {
                closeButton: true,
                tapToDismiss: false,
            });
        }
        // , 2000 PARA DEMORA EN CARGAR
    );
    });
</script>


@endif @if(Session::has('info'))
<script>

$(window).on("load", function () {
    "use strict";
    // On load Toast
    setTimeout(function () {
        toastr["info"]("{{ session('info') }}", "🔔 Información !", {
            closeButton: true,
            tapToDismiss: false,
        });
    });
});
</script>
@endif @if(Session::has('warning'))
<script>

$(window).on("load", function () {
    "use strict";
    // On load Toast
    setTimeout(function () {
        toastr["warning"]("{{ session('warning') }}", "💡 Aviso !", {
            closeButton: true,
            tapToDismiss: false,
        });
    });

});
</script>
@endif @if(Session::has('error'))
<script>

$(window).on("load", function () {
    "use strict";
    // On load Toast
    setTimeout(function () {
        toastr["error"]("{{ session('error') }}", "💪 Error !", {
            closeButton: true,
            tapToDismiss: false,
        });
        /*  Swal.fire({
              icon: 'success'
              , title: 'Eliminado!'
              , text: 'Registro eliminado correctamente'
              , customClass: {
                  confirmButton: 'btn btn-success'
              }
          });*/
    });
});
</script>
@endif

@endsection
