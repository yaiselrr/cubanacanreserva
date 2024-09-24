$('#btn_search').on('click', function (event) {
    var destino = $('#destino').val();
    var producto = $('#producto').val();
    var fecha = $('#fecha').val();

    if (destino == -1 && producto == -1 && fecha == "") {
        swal.fire({
            toast: true,
            class: 'bg-danger',
            position: 'top-end',
            showConfirmButton: false,
            timer: 4500,
            type: 'error',
            title: 'Por favor, seleccione al menos un criterio de búsqueda',
        });
        event.preventDefault();
        return;
    }
});
