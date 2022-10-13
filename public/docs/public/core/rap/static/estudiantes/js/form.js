$(document).ready(function() {

    //SELECT2 PARA LAS OPCIONES DE COMBOBOX
    $('.selectOption').select2({
        placeholder: 'SELECCIONE UNA OPCIÓN',
        tags: true,
    }).on('select2:close', function() {

    });
});

//FUNCIÓN QUE PERMITE AGREGAR LA INFORMACIÓN DEL ESTUDIANTE ASOCIADA A LA VENTANA MODAL.
function agregaEstudiante(datos) {
    d = datos.split('||');
    console.log(d);
    $('#rut').val(d[0] + "-" + d[1]);
    $('#estuRegistro').val(d[2]);
    $("#carrera").val(d[4]);
    $("#cod_carrera").val(d[3]);
    $("#planCarrera2").val(d[5]);
    $("#anhoIngreso").val(d[6]);
    $("#estuAcademico").val(d[8]);
    $("#semestre").val(d[9]);
    $("#viaIngreso").val(d[11]);
    $("#condicionAdmision").val(d[13]);
    $("#nombre").val(d[16] + " " + d[17] + " " + d[18] + " " + d[19]);

    //FUNCIÓN QUE PERMITE CARGAR LOS INSTRUMENTOS AL SELECT DE LA VENTANA MODAL.
    function cargarInstrumentos() {
        $("#instrumento").html('<option selected disabled>SELECCIONE UNA OPCIÓN...</option>');
        var dir = "cargarEstudiante";
        return $.ajax({
            type: 'POST',
            url: '/docs/public/core/rap/view/estudiantes/query/instrumentos.php',
            data: {
                'carr_codigo': d[3],
                'plan_codigo': $("#planCarrera2").val()
            },
            success: function(array) {
                $("#planCarrera2").trigger("change");
                var array = [d[21]];
                for (var i = 0; i < array.length; i++) {
                    $("#instrumento2").append("<option selected='" + array[i] + "'>" + array[i] + "</option>");
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(xhr);
                console.log(textStatus);
                console.log(errorThrown);
            }

        });
    }

    cargarInstrumentos();
    $("#instrumentos").val();
}

function sumarLogro() {
    //FUNCIÓN QUE SUMA Y GENERA EL PROMEDIO OBTENIDO O EL LOGRO TOTAL OBTENIDO.
    var cont = 0;

    $('#formEstudiante input[type=checkbox]').each(function() {
        if (this.checked) {
            cont++;
        }
    });
    var total = 0;
    var nrow = 0;

    $('.logroArea').each(function() {
        if (isNaN(parseFloat($(this).val()))) {
            total += 0;
        } else {

            total += parseFloat($(this).val());
        }
    });
    $(".cuerpo").each(function() {
        nrow;
        document.getElementById('logroObtenido').innerHTML = total / cont;
    });
}

function EnableDisabledtextbox(habilitarLogro, iInd) {
    //FUNCIÓN QUE HABILITA EL CAMPO DONDE SE INGRESA EL PORCENTAJE OBTENIDO POR EL ALUMNO EN CADA ÁREA
    var txtLogro = document.getElementById('logroArea' + iInd);
    var selectConcepto = document.getElementById('conceptoEvaluacion');

    txtLogro.disabled = habilitarLogro.checked ? false : true;
    if (!txtLogro.disabled) {
        txtLogro.focus();
    }

    selectConcepto.disabled = habilitarLogro.checked ? false : true;
    if (!selectConcepto.disabled) {
        selectConcepto.focus();
    }

    if (document.getElementById('habilitarLogro' + iInd).checked) {
        document.getElementById('logroArea' + iInd).style.display = "block";
        document.getElementById('conceptoEvaluacion').style.display = "block";

    } else {
        document.getElementById('logroArea' + iInd).value = null;
        document.getElementById('conceptoEvaluacion').value = null;
        $("#logroObtenido").html("");
    }
}