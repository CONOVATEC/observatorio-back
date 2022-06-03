window.deleteConfirm = function () {
    /*Swal.fire({
            title: '¿Estas seguro de eliminar?'
            , icon: 'warning'
            , text: 'esta operación eliminará pemanentemente el registro'
            , showCancelButton: true
            , confirmButtonText: 'Sí, eliminar'
            , confirmButtonColor: '#3085d6'
            , cancelButtonText: 'No, cancelar'
            , cancelButtonColor: '#d33'
        }).then(function(result) {
            if (result.value) {
                $('#formEliminar').submit();
            } else {
                Swal.fire({
                    title: 'Operación cancelada!'
                    , icon: 'info'
                });
            }
        });*/

    Swal.fire({
        title: "¿Estás seguro de eliminar?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "¡Sí, bórralo!",
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-outline-danger ms-1",
        },
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            $("#formDestroy").submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: "Cancelado",
                text: "No se eliminó ningún registro 🙂",
                icon: "error",
                customClass: {
                    confirmButton: "btn btn-success",
                },
            });
        }
    });
};
