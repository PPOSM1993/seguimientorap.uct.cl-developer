//FUNCIÓN QUE PERMITE CAPTURAR LOS DATOS Y PASARLOS AL FORMULARIO DE EDITAR ACCIONES DE NIVELACIÓN.
function agregaNivelacion(datos) {

    d = datos.split('||');

    accionUpdate = $("#accion_hidden").val(d[0]);
    anivAnhoCohorteUpdate = $("#anivAnhoCohorteUpdate").val(d[1]);
    anivDescripcionUpdate = $("#anivDescripcionUpdate").val(d[2]);
    anivObservacionUpdate = $("#anivObservacionUpdate").val(d[3]);
    tins_hidden = $("#tins_hidden").val(d[6]);
    tinsNombreUpdate = $("#tinsNombreUpdate").val(d[7]);
    carr_hidden = $("#carr_hidden").val(d[9]);
    carreraAccionUpdate = $("#carreraAccionUpdate").val(d[9] + "-" + d[10]);


    console.log(datos);
}

function validaActualizacionNivelacion() {
    //DATOS A VALIDAR
    var accionUpdate = document.getElementById('accion_hidden').value;
    var anivAnhoCohorteUpdate = document.getElementById('anivAnhoCohorteUpdate').value; //para saber la carrera
    var carreraAccionUpdate = document.getElementById('carr_hidden').value;
    var tinsNombreUpdate = document.getElementById('tins_hidden').value;
    //var anivAnhoUpdate;
    //var anivSemestreUpdate;

    //DATOS A MODIFICAR
    var anivDescripcionUpdate = document.getElementById('anivDescripcionUpdate').value;
    var anivObservacionUpdate = document.getElementById('anivObservacionUpdate').value;


    if (accionUpdate == null || accionUpdate == '' || accionUpdate.length == 0 || /^\s+$/.test(accionUpdate)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
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

    if (anivAnhoCohorteUpdate == null || anivAnhoCohorteUpdate == '' || anivAnhoCohorteUpdate.length == 0 || /^\s+$/.test(anivAnhoCohorteUpdate)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
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

    if (carreraAccionUpdate == null || carreraAccionUpdate == '' || carreraAccionUpdate.length == 0 || /^\s+$/.test(carreraAccionUpdate)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
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

    if (tinsNombreUpdate == null || tinsNombreUpdate == '' || tinsNombreUpdate.length == 0 || /^\s+$/.test(tinsNombreUpdate)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
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



    if (anivDescripcionUpdate == null || anivDescripcionUpdate == '' || anivDescripcionUpdate.length == 0 || /^\s+$/.test(anivDescripcionUpdate)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
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

    if (anivObservacionUpdate == null || anivObservacionUpdate == '' || anivObservacionUpdate.length == 0 || /^\s+$/.test(anivObservacionUpdate)) {
        Swal.fire({
            title: '<p class="text-uppercase title-principal">Mensaje</p>',
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
                url: "../../../docs/public/core/rap/view/acciones/update_accion.php",
                dataType: "html",
                data: {
                    accionUpdate: accionUpdate,
                    anivAnhoCohorteUpdate: anivAnhoCohorteUpdate,
                    carreraAccionUpdate: carreraAccionUpdate,
                    tinsNombreUpdate: tinsNombreUpdate,
                    anivDescripcionUpdate: anivDescripcionUpdate,
                    anivObservacionUpdate: anivObservacionUpdate
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
    $("#anivDescripcionUpdate").keyup(function(event) {
        $("#contadorDescripcionUpdate").text($(this).val().length);
        var x = $(this).val().length;
        if (x > 250) {
            $(this).css("border", '1px solid red');
            $(".error-msg-descripcion-update").show();
        } else {
            $(".error-msg-descripcion-update").hide();
            $(this).css("border", '');
        }
    });

    $("#anivObservacionUpdate").keyup(function(event) {
        $("#contadorObservacionUpdate").text($(this).val().length);
        var x = $(this).val().length;
        if (x > 250) {
            $(this).css("border", '1px solid red');
            $(".error-msg-observacion-update").show();
        } else {
            $(".error-msg-observacion-update").hide();
            $(this).css("border", '');
        }
    });
})