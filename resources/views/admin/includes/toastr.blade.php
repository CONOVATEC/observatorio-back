@if(Session::has('success'))
<script>
    // On load Toast
    setTimeout(function() {
        toastr["success"](
            "{{ session('success') }}"
            , "💪 Excelente!", {
                closeButton: true
                , tapToDismiss: false
            , }
        );
    }, 2000);

</script>
@endif
@if(Session::has('info'))
<script>
    // On load Toast
    setTimeout(function() {
        toastr["info"](
            "{{ session('info') }}"
            , "🔔 Información !", {
                closeButton: true
                , tapToDismiss: false
            , }
        );
    }, 2000);

</script>
@endif
@if(Session::has('warning'))
<script>
    // On load Toast
    setTimeout(function() {
        toastr["warning"](
            "{{ session('warning') }}"
            , "💡 Advertencia !", {
                closeButton: true
                , tapToDismiss: false
            , }
        );
    }, 2000);

</script>
@endif
@if(Session::has('error'))
<script>
    // On load Toast
    setTimeout(function() {
        toastr["error"](
            "{{ session('error') }}"
            , "💪 Alerta !", {
                closeButton: true
                , tapToDismiss: false
            , }
        );
        /*  Swal.fire({
              icon: 'success'
              , title: 'Eliminado!'
              , text: 'Registro eliminado correctamente'
              , customClass: {
                  confirmButton: 'btn btn-success'
              }
          });*/
    }, 2000);

</script>
@endif
