/**
 * =============================================
 * CARGA LOS DATOS DE LOS ESTUDIANTES A LA LISTA
 * =============================================
 */

$(document).ready(function() {
    $("#tblLogrosEstudiantes").DataTable({
        destroy: true,


        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
});

//FUNCIÓN QUE VALIDA EL FORMATO DE RUT PARA LA BÚSQUEDA DE LA INFORMACIÓN
function validaFormBusquedaRut() {

    datoBuscar = document.getElementById('txtBuscaRut').value;
    boton = 1

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
        $('#frmBusquedaRut').submit(function(e) {
            e.preventDefault();

            formData = new FormData();
            formData.append('datoBuscar', datoBuscar);
            formData.append('boton', boton);
            var form = $(this);
            var url = form.attr('action');


            let timerInterval;
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
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    $.ajax({
                        type: "POST",
                        url: "../../../docs/public/core/rap/view/estudiantes/select_estudiante.php",

                        data: {
                            datoBuscar: datoBuscar,
                            boton: boton
                        },

                        success: function(data) {
                            $('#divresultadoEstudiantes').html(data);
                        }
                    });
                }
            })
        });
    }
}

//FUNCIÓN QUE VALIDA LA BÚSQUEDA POR CARRERA.
function validaFormBusquedaCarrera() {

    datoBuscar = document.getElementById('selectCarrera').value;
    boton = 2

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
        $('#frmBusquedaCarrera').submit(function(e) {
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
                        url: "../../../docs/public/core/rap/view/estudiantes/select_estudiante.php",
                        data: {
                            datoBuscar: datoBuscar,
                            boton: boton
                        },

                        success: function(data) {
                            $('#divresultadoEstudiantes').html(data);
                        }
                    });
                }
            })
        });
    }
}

//FUNCIÓN QUE VALIDA LA BÚSQUEDA VÍA AÑO DE INGRESO
function validaFormBusquedaAnho() {

    datoBuscar = document.getElementById('anhoIngresoBuscar').value;
    boton = 3

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
        $('#frmBusquedaAnho').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');

            formData = new FormData();
            formData.append('datoBuscar', datoBuscar);
            formData.append('boton', boton);

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
                        url: "../../../docs/public/core/rap/view/estudiantes/select_estudiante.php",
                        data: {
                            datoBuscar: datoBuscar,
                            boton: boton
                        },
                        success: function(data) {
                            $('#divresultadoEstudiantes').html(data);
                        }
                    });
                }
            })
        });
    }
}

//FUNCIÓN QUE VALIDA LA BÚSQUEDA VÍA CONDICIÓN ADMISIÓN
function validaFormBusquedaCondicion() {

    datoBuscar = document.getElementById('condicion').value;
    boton = 4

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
        $('#frmBusquedaCondicion').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');
            formData = new FormData();
            formData.append('datoBuscar', datoBuscar);
            formData.append('boton', boton);
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
                        url: "../../../docs/public/core/rap/view/estudiantes/select_estudiante.php",

                        data: {
                            datoBuscar: datoBuscar,
                            boton: boton
                        },
                        success: function(data) {
                            $('#divresultadoEstudiantes').html(data);
                        }
                    });
                }
            })
        });
    }
}