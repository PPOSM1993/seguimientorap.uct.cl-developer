//FUNCIÓN QUE PERMITE CAPTURAR LOS DATOS Y PASARLOS AL FORMULARIO DE EDITAR INSTRUMENTOS.
function agregaInstrumento(datos) {

    d = datos.split('||');

    carrera = $("#carreraUpdate").val(d[1] + " - " + d[14]);
    planCarrera = $("#planCarreraUpdate").val(d[2]);
    instrumento = $("#instrumentoUpdate").val(d[3]);
    tinsDescripcion = $("#tinsDescripcionUpdate").val(d[4]);
    tinsPorcentaje = $("#tinsPorcentajeUpdate").val(d[5]);
    tinsVigente = $("#tinsVigenteUpdate").val(d[6]);

    carr_hidden = $("#carr_hidden").val(d[1]);
    tins_hidden = $("#tins_hidden").val(d[0]);
}

function validaActualizacionInstrumento() {
    //datos a valdiar
    var carreraUpdate = document.getElementById('carr_hidden').value; //para saber la carrera
    var planCarreraUpdate = document.getElementById('planCarreraUpdate').value; // para determinar cual de todas los planes de la carrera
    var instrumentoUpdate = document.getElementById('tins_hidden').value;
    //datos a modificar
    var tinsDescripcionUpdate = document.getElementById('tinsDescripcionUpdate').value;
    var tinsPorcentajeUpdate = document.getElementById('tinsPorcentajeUpdate').value;
    var tinsVigenteUpdate = document.getElementById('tinsVigenteUpdate').value;
    var tinsTexto = document.getElementById('instrumentoUpdate').value; //cuál intrumento en la carrera es el que se modifica

    if (planCarreraUpdate == null || planCarreraUpdate == '' || planCarreraUpdate.length == 0 || /^\s+$/.test(planCarreraUpdate)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (instrumentoUpdate == null || instrumentoUpdate == '' || instrumentoUpdate.length == 0 || /^\s+$/.test(instrumentoUpdate)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (tinsVigenteUpdate == null || tinsVigenteUpdate == '' || tinsVigenteUpdate.length == 0 || /^\s+$/.test(tinsVigenteUpdate)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (tinsDescripcionUpdate == null || tinsDescripcionUpdate == '' || tinsDescripcionUpdate.length == 0 || /^\s+$/.test(tinsDescripcionUpdate)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (tinsPorcentajeUpdate == null || tinsPorcentajeUpdate == '' || tinsPorcentajeUpdate.length == 0 || /^\s+$/.test(tinsPorcentajeUpdate)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {

        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    Swal.fire({
        title: '¿Desea guardar esta información?',
        showDenyButton: true,
        confirmButtonText: 'Si',
        confirmButtonColor: '#02A411',
        denyButtonText: 'No',
        icon: 'warning'
    }).then((resultado) => {
        if (resultado.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "../../../docs/public/core/rap/view/instrumentos/update_instrumento.php",
                dataType: "html",
                data: {
                    carreraUpdate: carreraUpdate,
                    planCarreraUpdate: planCarreraUpdate,
                    instrumentoUpdate: instrumentoUpdate,
                    tinsDescripcionUpdate: tinsDescripcionUpdate,
                    tinsPorcentajeUpdate: tinsPorcentajeUpdate,
                    tinsVigenteUpdate: tinsVigenteUpdate,
                    tinsTexto: tinsTexto
                },
                success: function(datos) {
                    if (datos = true) {
                        Swal.fire({
                            title: 'Mensaje',
                            icon: 'success',
                            text: 'Datos ingresados correctamente.',
                            confirmButtonColor: '#0d6efd',
                            confirmButtonText: 'OK',
                        }).then((resultado) => {
                            $(location).attr('href', '../../../?menu=listarInstrumentos');
                        })

                    } else if (resultado.isDenied) {
                        Swal.fire('Operación Cancelada', 'info');
                    } else {

                    }
                }
            });
        }
    });
}

$(function() {
    $("#tinsDescripcionUpdate").keyup(function(event) {
        $("#contadorCaracteresUpdate").text($(this).val().length);
        var x = $(this).val().length;
        if (x > 250) {
            $(this).css("border", '1px solid red');
            $(".error-msg-update").show();
        } else {
            $(".error-msg-update").hide();
            $(this).css("border", '');
        }
    });
});

function cienUpdate() {
    const input = document.getElementById('tinsPorcentajeUpdate');
    input.addEventListener('input', e => {
        const value = parseInt(e.currentTarget.value);
        if (value > 100) {
            input.value = 0;
            //alert('Por favor ingresa un número menor a 100');
            Swal.fire({
                title: '<p class="title-principal text-uppercase">Mensaje</p>',
                icon: 'error',
                html: '<p class="title-principal text-uppercase">Error en el ingreso del procentaje.<br>' + 'Máximo: 100 caracteres.</p>',
                footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
                confirmButtonColor: '#0d6efd',
                confirmButtonText: 'OK'
            });
        }
    });
}