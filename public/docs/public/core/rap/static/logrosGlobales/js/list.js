/*$(document).ready(function() {
    $("#tblLogrosGlobales").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
});*/

//FUNCIÓN QUE VALIDA LA BÚSQUEDA POR CARRERA.
function validaFormBusquedaCarreraLogro() {
    datoBuscar = document.getElementById('selectCarreraLogroGlobal').value;
    boton = 1;

    if (datoBuscar == '') {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'error',
            html: '<p class="text-uppercase title-principal">Seleccione una opción.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        $('#frmBusquedaCarreraLogrosGlobales').submit(function(e) {
            e.preventDefault();

            formData = new FormData();
            formData.append('datoBuscar', datoBuscar);
            formData.append('boton', boton);
            var form = $(this);
            var url = form.attr('action');

            let timerInterval
            Swal.fire({
                title: '<p class="text-uppercase title-principal">solicitando información</p>',
                html: '<p class="text-center text-uppercase title-principal">Verificando que el dato exista</p>',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    $.ajax({
                        type: "POST",
                        url: "../../../docs/public/core/rap/view/logros_globales/select_logros_globales.php",
                        data: {
                            datoBuscar: datoBuscar,
                            boton: boton
                        },

                        success: function(data) {
                            $('#divresultadoLogros').html(data);
                        }
                    });
                }
            })
        });
    }
}

function validaFormBusquedaAnhoLogro() {
    datoBuscar = document.getElementById('anhoIngresoBuscarLogroGlobal').value;
    boton = 2;

    if (datoBuscar == '') {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'error',
            html: '<p class="text-uppercase title-principal">Seleccione una opción.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        $('#frmBusquedaAnhoLogroGlobales').submit(function(e) {
            e.preventDefault();

            formData = new FormData();
            formData.append('datoBuscar', datoBuscar);
            formData.append('boton', boton);
            var form = $(this);
            var url = form.attr('action');

            let timerInterval
            Swal.fire({
                title: '<p class="text-uppercase title-principal">solicitando información</p>',
                html: '<p class="text-center text-uppercase title-principal">Verificando que el dato exista</p>',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    $.ajax({
                        type: "POST",
                        url: "../../../docs/public/core/rap/view/logros_globales/select_logros_globales.php",
                        data: {
                            datoBuscar: datoBuscar,
                            boton: boton
                        },

                        success: function(data) {
                            $('#divresultadoLogros').html(data);
                        }
                    });
                }
            })
        });
    }
}

function validaFormBusquedaCondicionLogro() {
    datoBuscar = document.getElementById('condicionLogroGlobales').value;
    boton = 3;

    if (datoBuscar == '') {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'error',
            html: '<p class="text-uppercase title-principal">Seleccione una opción.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        $('#frmBusquedaCondicionLogroGlobales').submit(function(e) {
            e.preventDefault();

            formData = new FormData();
            formData.append('datoBuscar', datoBuscar);
            formData.append('boton', boton);
            var form = $(this);
            var url = form.attr('action');

            let timerInterval
            Swal.fire({
                title: '<p class="text-uppercase title-principal">solicitando información</p>',
                html: '<p class="text-center text-uppercase title-principal">Verificando que el dato exista</p>',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    $.ajax({
                        type: "POST",
                        url: "../../../docs/public/core/rap/view/logros_globales/select_logros_globales.php",
                        data: {
                            datoBuscar: datoBuscar,
                            boton: boton
                        },

                        success: function(data) {
                            $('#divresultadoLogros').html(data);
                        }
                    });
                }
            })
        });
    }
}