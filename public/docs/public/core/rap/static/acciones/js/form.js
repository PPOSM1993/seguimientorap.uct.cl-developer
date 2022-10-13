$(document).ready(function() {
    //SELECT2 PARA OPCIONES DE COMBO BOX
    $('.selectOption').select2({
        placeholder: 'SELECCIONE UNA OPCIÓN',
        tags: true,
    }).on('select2:close', function() {

    });
});

function validaFormAcciones() {
    //VALIDACIÓN FORMULARIO ACCIONES DE NIVELACIÓN.
    var carrera = document.getElementById('carreraAccion').value;
    var instrumento = document.getElementById('instrumento').value;
    var anivAnhoCohorte = document.getElementById('anivAnhoCohorte').value;
    var anivDescripcion = document.getElementById('anivDescripcion').value;
    var anivObservacion = document.getElementById('anivObservacion').value;
    var anivAnho;
    var anivSemestre;

    //VALIDACIONES DE CAMPOS VACÍOS.
    if (carrera == null || carrera == '' || carrera.length == 0 || /^\s+$/.test(carrera)) {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'error',
            html: '<p class="title-principal text-uppercase">El formulario está incompleto o algunos campos presentan errores.</p>',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'success',
            html: '<p class="title-principal text-uppercase">Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (anivAnhoCohorte == null || anivAnhoCohorte == '' || anivAnhoCohorte.length == 0 || /^\s+$/.test(anivAnhoCohorte)) {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'error',
            html: '<p class="title-principal text-uppercase">El formulario está incompleto o algunos campos presentan errores.</p>',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'success',
            html: '<p class="title-principal text-uppercase">Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (instrumento == null || instrumento == '' || instrumento.length == 0 || /^\s+$/.test(instrumento)) {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'error',
            html: '<p class="title-principal text-uppercase">El formulario está incompleto o algunos campos presentan errores.</p>',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'success',
            html: '<p class="title-principal text-uppercase">Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (anivDescripcion == null || anivDescripcion == '' || anivDescripcion.length == 0 || /^\s+$/.test(anivDescripcion)) {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'error',
            html: '<p class="title-principal text-uppercase">El formulario está incompleto o algunos campos presentan errores.</p>',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else if (anivDescripcion.length > 250) {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'error',
            html: '<p class="title-principal text-uppercase">La descripción del instrumento excedió la cantidad de caracteres permitido.<br>' + 'Máximo: 250 caracteres.</p>',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'success',
            html: '<p class="title-principal text-uppercase">Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (anivObservacion == null || anivObservacion == '' || anivObservacion.length == 0 || /^\s+$/.test(anivObservacion)) {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'error',
            html: '<p class="title-principal text-uppercase">El formulario está incompleto o algunos campos presentan errores.</p>',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else if (anivObservacion.length > 250) {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'error',
            html: '<p class="title-principal text-uppercase">La observación del instrumento excedió la cantidad de caracteres permitido.<br>' + 'Máximo: 250 caracteres.</p>',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'success',
            html: '<p class="title-principal text-uppercase">Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    datos = $('#frmAcciones').serialize();

    Swal.fire({
        title: '<p class="title-principal text-uppercase">¿Desea guardar esta información?</p>',
        showDenyButton: true,
        confirmButtonText: 'Si',
        confirmButtonColor: '#02A411',
        denyButtonText: 'No',
        icon: 'warning'
    }).then((resultado) => {
        if (resultado.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "../../../docs/public/core/rap/view/acciones/insert_accion.php",
                dataType: "html",
                data: {
                    tins_codigo: instrumento,
                    aniv_anho_cohorte: anivAnhoCohorte,
                    aniv_descripcion: anivDescripcion,
                    aniv_observacion: anivObservacion,
                    aniv_anho_nivelacion: anivAnho,
                    aniv_semestre_nivelacion: anivSemestre
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
                            $(location).attr('href', '../../../?menu=listadoAcciones');
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
    $("#anivDescripcion").keyup(function(event) {
        $("#contadorDescripcion").text($(this).val().length);
        var x = $(this).val().length;
        if (x > 250) {
            $(this).css("border", '1px solid red');
            $(".error-msg-descripcion").show();
        } else {
            $(".error-msg").hide();
            $(this).css("border", '');
        }
    });

    $("#anivObservacion").keyup(function(event) {
        $("#contadorObservacion").text($(this).val().length);
        var x = $(this).val().length;
        if (x > 250) {
            $(this).css("border", '1px solid red');
            $(".error-msg-observacion").show();
        } else {
            $(".error-msg-observacion").hide();
            $(this).css("border", '');
        }
    });
})