$(document).ready(function() {

    //Select2 para opciones de combo box.
    $('.selectOption').select2({
        placeholder: 'SELECCIONE UNA OPCIÓN',
        tags: true,
    }).on('select2:close', function() {

    });
});

//Validaciones Formulario de Instrumentos (campos vacíos):
function validaFormArea() {
    var carrera = document.getElementById('carrera').value;
    var planCarrera = document.getElementById('planCarrera').value;
    var instrumento = document.getElementById('instrumento').value;
    var areaEvaluacion = document.getElementById('areaEvaluacion').value;
    var rearNombreDescripcion = document.getElementById('rearNombreDescripcion').value;
    var rearVigente = 'S'

    if (carrera == null || carrera == '' || carrera.length == 0 || /^\s+$/.test(carrera)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'error',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            footer: '<p class="text-uppercase title-principal">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'success',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (planCarrera == null || planCarrera == '' || planCarrera.length == 0 || /^\s+$/.test(planCarrera)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'error',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            footer: '<p class="text-uppercase title-principal">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'success',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (instrumento == null || instrumento == '' || instrumento.length == 0 || /^\s+$/.test(instrumento)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'error',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            footer: '<p class="text-uppercase title-principal">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'success',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (areaEvaluacion == null || areaEvaluacion == '' || areaEvaluacion.length == 0 || /^\s+$/.test(areaEvaluacion)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'error',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            footer: '<p class="text-uppercase title-principal">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'success',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (rearVigente == null || rearVigente == '' || rearVigente.length == 0 || /^\s+$/.test(rearVigente)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'error',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            footer: '<p class="text-uppercase title-principal">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'success',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (rearNombreDescripcion == null || rearNombreDescripcion == '' || rearNombreDescripcion.length == 0 || /^\s+$/.test(rearNombreDescripcion)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'error',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            footer: '<p class="text-uppercase title-principal">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;
    } else {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
            icon: 'success',
            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    datos = $('#frmAreas').serialize();

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
                url: "../../../docs/public/core/rap/view/areas/insert_area.php",
                dataType: "html",
                data: {
                    carr_codigo: carrera,
                    plan_codigo: planCarrera,
                    tins_codigo: instrumento,
                    rear_nombre_area: areaEvaluacion,
                    rear_descripcion_area: rearNombreDescripcion,
                    rear_vigente: rearVigente
                },
                success: function(datos) {
                    if (datos = true) {
                        Swal.fire({
                            title: '<p class="text-uppercase title-principal">Mensaje</p>',
                            icon: 'success',
                            html: '<p class="text-uppercase title-principal">El formulario está incompleto o algunos campos presentan errores</p>.',
                            confirmButtonColor: '#0d6efd',
                            confirmButtonText: 'OK'
                        }).then((resultado) => {
                            $(location).attr('href', '../../../?menu=listarAreas');
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
    $("#rearNombreDescripcion").keyup(function(event) {
        $("#contadorCaracteres").text($(this).val().length);
        var x = $(this).val().length;
        if (x > 250) {
            $(this).css("border", '1px solid red');
            $(".error-msg").show();
        } else {
            $(".error-msg").hide();
            $(this).css("border", '');
        }
    });
})