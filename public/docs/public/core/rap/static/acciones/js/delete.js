$(document).ready(function() {

    $('.deleteAccion').on('click', function(e) {
        e.preventDefault();

        var item = $(this).attr('data');

        Swal.fire({
            title: 'CONFIRMACIÓN',
            text: "¿Desea eliminar esta área?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((resultado) => {

            if (resultado.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "../../../docs/public/core/rap/view/acciones/delete_accion.php",
                    dataType: "html",
                    data: { item: item },

                    success: function(resultado) {
                        Swal.fire({
                            title: 'Mensaje',
                            icon: 'success',
                            text: 'Área eliminada correctamente.',
                            confirmButtonColor: '#0d6efd',
                            confirmButtonText: 'OK',
                        }).then((resultado) => {
                            $(location).attr('href', '../../../?menu=listadoAcciones');
                        })
                    }

                });
            }
        })
    });
});