$(document).ready(function() {
    //SELECT2 PARA OPCIONES DE COMBO BOX
    $('.selectOption').select2({
        placeholder: 'SELECCIONE UNA OPCIÓN',
        tags: true,
    }).on('select2:close', function() {

    });
});

//VALIDACIÓN DEL FORMULARIO DE INSTRUMENTOS
function validaFormInstrumento() {
    var carrera = document.getElementById('carrera').value;
    var planCarrera = document.getElementById('planCarrera').value;
    var instrumento = document.getElementById('instrumento').value;
    var tinsDescripcion = document.getElementById('tinsDescripcion').value;
    var tinsPorcentaje = document.getElementById('tinsPorcentaje').value;
    var tinsVigente = 'S';

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
            text: '<p class="title-principal text-uppercase">Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (planCarrera == null || planCarrera == '' || planCarrera.length == 0 || /^\s+$/.test(planCarrera)) {
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
            title: 'Mensaje',
            icon: 'success',
            text: 'Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (instrumento == null || instrumento == '' || instrumento.length == 0 || /^\s+$/.test(instrumento)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
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

    if (tinsVigente == null || tinsVigente == '' || tinsVigente.length == 0 || /^\s+$/.test(tinsVigente)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
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

    if (tinsPorcentaje == null || tinsPorcentaje == '' || /^\s+$/.test(tinsPorcentaje)) {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'error',
            html: '<p class="title-principal text-uppercase">El formulario está incompleto o algunos campos presentan errores.</p>',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;

    }

    if (tinsDescripcion == null || tinsDescripcion == '' || tinsDescripcion.length == 0 || /^\s+$/.test(tinsDescripcion)) {
        Swal.fire({
            title: '<p class="title-principal text-uppercase">Mensaje</p>',
            icon: 'error',
            html: '<p class="title-principal text-uppercase">El formulario está incompleto o algunos campos presentan errores.</p>',
            footer: '<p class="title-principal text-uppercase">Verificar que esté todo correcto.</p>',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
        return false;

    } else if (tinsDescripcion.length > 250) {
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
            text: 'Datos ingresados correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    datos = $('#frmInstrumentos').serialize();

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
                url: "../../../docs/public/core/rap/view/instrumentos/insert_instrumento.php",
                dataType: "html",
                data: {
                    carr_codigo: carrera,
                    plan_codigo: planCarrera,
                    tins_nombre: instrumento,
                    tins_descripcion: tinsDescripcion,
                    tins_porcentaje: tinsPorcentaje,
                    tins_vigente: tinsVigente
                },
                success: function(datos) {
                    if (datos = true) {
                        Swal.fire({
                            title: '<p class="title-principal text-uppercase">Mensaje</p>',
                            icon: 'success',
                            html: '<p class="title-principal text-uppercase">Datos ingresados correctamente.</p>',
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

//CALCULA QUE LA DESCRIPCIÓN DEL INSTRUMENTO NO SEA MAYOR A 250
$(function() {
    $("#tinsDescripcion").keyup(function(event) {
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

//CALCULA QUE EL INPUT PORCENTAJE ENO SE PUEDAN INGRESAR MAYORES A 100
function cien() {
    const input = document.getElementById('tinsPorcentaje');
    input.addEventListener('input', e => {
        const value = parseInt(e.currentTarget.value);
        if (value > 100 || value < 0) {
            input.value = 0;
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

function restarPorcentaje() {

    var inicio = 100;
    var tinsPorcentaje = document.getElementById('tinsPorcentaje').value;
    var resultado = document.getElementById('tinsRestante').value;

    resultado = inicio - tinsPorcentaje;

    document.getElementById('tinsRestante').innerHTML = inicio - tinsPorcentaje

    $("#tinsRestante").html(resultado);

}