function agregaArea(datos) {
    d = datos.split('||');
    console.log(datos);


    $('#areaUpdate').val(d[1]);
    $('#areaDescripcionUpdate').val(d[4]);
    $('#instrumentoUpdate').val(d[5]);
    $('#carreraUpdate').val(d[6] + " - " + d[7]);
    $('#planCarreraUpdate').val(d[8]);
    $('#areaVigenteUpdate').val(d[3]);

    carr_hidden = $("#carr_hidden").val(d[6]);
    tins_hidden = $("#tins_hidden").val(d[2]);
    area_hidden = $("#area_hidden").val(d[0]);
}

function validaActualizacionArea() {


    //DATOS A VALIDAR
    var carreraUpdate = document.getElementById('carr_hidden').value;
    var planCarreraUpdate = document.getElementById('planCarreraUpdate').value;
    var instrumentoUpdate = document.getElementById('tins_hidden').value;
    var areaUpdate = document.getElementById('area_hidden').value;
    var areaTexto = document.getElementById('areaUpdate').value; //cuál instrumento en la carrera es el que se modifica
    //datos a modificar
    var areaDescripcionUpdate = document.getElementById('areaDescripcionUpdate').value;
    var areaVigenteUpdate = document.getElementById('areaVigenteUpdate').value;

    if (carreraUpdate == null || carreraUpdate == '' || carreraUpdate.length == 0 || /^\s+$/.test(carreraUpdate)) {
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
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

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
            text: 'Formulario completado correctamente.',
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
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (areaUpdate == null || areaUpdate == '' || areaUpdate.length == 0 || /^\s+$/.test(areaUpdate)) {
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
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (areaVigenteUpdate == null || areaVigenteUpdate == '' || areaVigenteUpdate.length == 0 || /^\s+$/.test(areaVigenteUpdate)) {
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

    if (areaDescripcionUpdate == null || areaDescripcionUpdate == '' || areaDescripcionUpdate.length == 0 || /^\s+$/.test(areaDescripcionUpdate)) {
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
                url: "../../../docs/public/core/rap/view/areas/update_area.php",
                dataType: "html",
                data: {
                    carreraUpdate: carreraUpdate,
                    planCarreraUpdate: planCarreraUpdate,
                    instrumentoUpdate: instrumentoUpdate,
                    areaUpdate: areaUpdate,
                    areaDescripcionUpdate: areaDescripcionUpdate,
                    areaVigenteUpdate: areaVigenteUpdate,
                    areaTexto: areaTexto
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
    $("#areaDescripcionUpdate").keyup(function(event) {
        $("#contadorUpdate").text($(this).val().length);
        var x = $(this).val().length;
        if (x > 250) {
            $(this).css("border", '1px solid red');
            $(".error-msg-descripcion-update").show();
        } else {
            $(".error-msg-descripcion-update").hide();
            $(this).css("border", '');
        }
    });
})