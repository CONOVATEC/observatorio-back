$(".deleteConfirm").click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: "¿Estás seguro de eliminar?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "¡Sí, bórralo!",
        cancelButtonText: "No, Cancelar",
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-outline-danger ms-1",
        },
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            form.submit();
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
});
$(".restoreConfirm").click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    // Para restaurar
    Swal.fire({
        title: "¿Quieres restaurar el registro?",
        text: "¡Podrás recuperar el registro eliminado!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "¡Sí, Restaurar!",
        cancelButtonText: "No, Cancelar",
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-outline-danger ms-1",
        },
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            // $("#formRestore").submit();
            form.submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: "Cancelado",
                text: "No se restauró ningún registro 🙂",
                icon: "error",
                customClass: {
                    confirmButton: "btn btn-success",
                },
            });
        }
    });
});
$(".deleteDefinitiveConfirm").click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    // Para eliminar definiitivamente
    Swal.fire({
        title: "¿Estás seguro de eliminar definitivamente el registro?",
        text: "¡Ya no quedaría ninguna forma de recuperar la información!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "¡Sí, bórralo definitivamente!",
        cancelButtonText: "No, Cancelar",
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-outline-danger ms-1",
        },
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            // $("#formDeleteDefinitive").submit();
            form.submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: "Cancelado",
                text: "No se eliminó ningún registro definitivamente 🙂",
                icon: "error",
                customClass: {
                    confirmButton: "btn btn-success",
                },
            });
        }
    });
});
