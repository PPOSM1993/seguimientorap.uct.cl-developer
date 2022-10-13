$(document).ready(function() {
    $('.deleteInstrumento').on('click', function(e) {
        e.preventDefault();

        var item = $(this).attr('data');

        Swal.fire({
            title: 'CONFIRMACIÓN',
            title: '<p class="title-principal">Confirmación</p>',
            html: '<p class="title-principal">¿Desea eliminar este instrumento?</p>',
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
                    url: "../../../docs/public/core/rap/view/instrumentos/delete_instrumento.php",
                    dataType: "html",
                    data: { item: item },

                    success: function(resultado) {

                        if (resultado == 2) {
                            Swal.fire({
                                title: '<p class="title-principal">Mensaje</p>',
                                icon: 'success',
                                html: '<p class="title-principal">Instrumento eliminado correctamente.</p>',
                                confirmButtonColor: '#0d6efd',
                                confirmButtonText: 'OK',
                            }).then((resultado) => {
                                $(location).attr('href', '../../../?menu=listarInstrumentos');
                            })
                        } else if (resultado == 0) {
                            Swal.fire({
                                title: '<p class="title-principal">Aviso</p>',
                                icon: 'info',
                                html: '<p class="title-principal">Registro no eliminado, existen área(s) asociada(s) al instrumento. </p>',
                                confirmButtonColor: '#0d6efd',
                                confirmButtonText: 'Entendido'
                            })
                        }
                        /*else if (resultado == 0) {
                                                    Swal.fire({
                                                        title: '<p class="title-principal text-uppercase">Mensaje</p>',
                                                        icon: 'error',
                                                        html: '<p class="title-principal text-uppercase">no se pudo.</p>',
                                                        confirmButtonColor: '#0d6efd',
                                                        confirmButtonText: 'OK'
                                                    })
                                                }
                                                else if (resultado == 0) {
                                                    Swal.fire({
                                                        title: '<p class="title-principal text-uppercase">Mensaje</p>',
                                                        icon: 'error',
                                                        html: '<p class="title-principal text-uppercase">no se pudo.</p>',
                                                        confirmButtonColor: '#0d6efd',
                                                        confirmButtonText: 'OK'
                                                    })
                                                }*/
                    }
                });
            }
        })
    });
});