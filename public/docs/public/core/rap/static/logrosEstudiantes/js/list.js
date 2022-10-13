$(document).ready(function() {




    var table = $("#tblLogrosEstudiantes").DataTable({
        "destroy": true,
        //BOTONES DE DATATABLE PARA REALIZAR ACCIONES DE EXPORTAR ARCHIVOS.
        pageLength: [10, 25, 50, 100],
        pageLength: 10,

        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    }, );


    /**
     * ================================
     * EVENTO PARA CRITERIO DE BÚSQUEDA
     * ================================
     */

    $("#txtRegistro").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    });

    $("#txtBuscarRut").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    });

    $("#txtBuscarNombre").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    });

    $("#selectBuscaCarrera").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    });

    $("#txtBuscarPlan").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    });

    $("#txtBuscaAno").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    });

    $("#btnLimpiar").on('click', function() {

        $("#txtRegistro").val('');
        $("#txtBuscarRut").val('');
        $("#txtBuscarNombre").val('');
        $("#txtBuscarPlan").val('');
        $("#txtBuscaAno").val('');
        table.search('').columns().search('').draw();
    });
});

function exportExcel() {
    alert("");
}

//FUNCIONES PARA BÚSQUEDA VÍA RUT
function validaFormBusquedaRutLogro() {
    datoBuscar = document.getElementById('txtBuscaRutLogro').value;
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
        $('#frmBusquedaRutLogro').submit(function(e) {
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
                        url: "../../../docs/public/core/rap/view/logros/select_logro_estudiante.php",
                        //data: form.serialize(),
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

//FUNCIÓN QUE VALIDA LA BÚSQUEDA POR CARRERA.
function validaFormBusquedaCarreraLogro() {

    datoBuscar = document.getElementById('selectCarreraLogro').value;
    boton = 2

    console.log(datoBuscar);

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
        $('#frmBusquedaCarreraLogro').submit(function(e) {
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
                        url: "../../../docs/public/core/rap/view/logros/select_logro_estudiante.php",
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

//FUNCIÓN QUE VALIDA LA BÚSQUEDA VÍA AÑO DE INGRESO
function validaFormAnhoLogro() {

    datoBuscar = document.getElementById('anhoIngresoBuscarLogro').value;
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
        $('#frmBusquedaAnhoLogro').submit(function(e) {
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
                        url: "../../../docs/public/core/rap/view/logros/select_logro_estudiante.php",
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

//FUNCIÓN QUE VALIDA LA BÚSQUEDA VÍA CONDICIÓN ADMISIÓN
function validaFormBusquedaCondicionLogro() {

    datoBuscar = document.getElementById('condicionLogro').value;
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
        $('#frmBusquedaCondicionLogro').submit(function(e) {
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
                        url: "../../../docs/public/core/rap/view/logros/select_logro_estudiante.php",

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