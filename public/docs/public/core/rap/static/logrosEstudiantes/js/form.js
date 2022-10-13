function agregaLogros(datoLogro) {
    d = datoLogro.split('||');
    $('#rut').val(d[0] + "-" + d[1]);
    $('#estuRegistro').val(d[2]);
    $('#carrera').val(d[3] + " - " + d[4]);
    $("#planCarrera2").val(d[5]);
    $('#anhoIngreso').val(d[6]);
    $('#anhoIngreso').val(d[6]);
    $('#estuAcademico').val(d[8]);
    $('#semestreIngreso').val(d[9]);
    $('#condicionAdmision').val(d[11]);
    $('#nombre').val(d[14] + " " + d[15] + " " + d[16] + " " + d[17]);
    $('#anhoEvaluacion').val(d[20]);
    $('#semestreEvaluacion').val(d[21]);
    $('#instrumento').val(d[25]);
    $('#areaEvaluacion').val(d[27]);


}

function validaFormLogro() {
    var total = $('#tblAreasEstudiantes tbody').length;
    var bEvar = true,
        //  iCont = 0,
        iPorc = 0,
        aDatos = {};
    for (var iCont = 0; iCont < total; iCont++) {
        $('#habilitarLogro0').prop('checked')
            //if (document.getElementById('habilitarLogro' + iCont)) {
        console.log($('#habilitarLogro' + iCont).prop('checked'), 'check');
        if ($('#habilitarLogro' + iCont).prop('checked')) {
            console.log('entra if' + iCont, 'prueba');
            var aReg = {};
            aReg.areaEvaluacion = document.getElementById('areaEvaluacionId' + iCont).innerText;
            aReg.logroArea = document.getElementById('logroArea' + iCont).value;
            aReg.habilitarLogro = document.getElementById('habilitarLogro' + iCont).value;
            //aReg.conceptoEvaluacion = document.getElementById('conceptoEvaluacion' + iCont).select;
            aReg.conceptoEvaluacion = document.getElementById('conceptoEvaluacion').value;
            //aReg.conceptoEvaluacion = 14;
            aReg.logroObtenido = document.getElementById('logroObtenido').innerText;
            aDatos[iCont] = aReg;
            (iPorc += document.getElementById('logroArea' + iCont).value);

        } else {
            bEvar = false;
        }

        //VALIDACIÓN DE FORMULARIO DE REGISTRO ÁREAS DE EVALUACIÓN EN CASO DE QUE EXISTAN CAMPOS VACIÓS 

        if (bEvar) {
            function cien() {
                const input = document.getElementById('logroArea');
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


        }
        // iCont++;
        iPorc = iPorc / iCont + 1;
        //console.log(aDatos);
    }
    //FIN FOR
    var rut = document.getElementById('rut').value;
    var estuRegistro = document.getElementById('estuRegistro').value;
    var instrumento2 = document.getElementById('instrumento2').value;
    var carrera = document.getElementById('cod_carrera').value;
    var planCarrera2 = document.getElementById('planCarrera2').value;
    var anhoIngreso = document.getElementById('anhoIngreso').value;
    var semestre = document.getElementById('semestre').value;


    Swal.fire({
        title: '<p class="title-principal text-uppercase">Desea guardar la información ingresada</p>',
        showDenyButton: true,
        confirmButtonText: 'Si',
        confirmButtonColor: '#02A411',
        denyButtonText: 'No',
        icon: 'warning'
    }).then((resultado) => {
        if (resultado.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "../../../docs/public/core/rap/view/estudiantes/insert_nota.php",
                dataType: "html",
                data: {
                    aDatos: JSON.stringify(aDatos),
                    tins_codigo: instrumento2,
                    estd_rut: rut,
                    estu_registro: estuRegistro,
                    carr_codigo: carrera,
                    plan_codigo: planCarrera2,
                    evar_anho_evaluacion: anhoIngreso,
                    evar_semestre_evaluacion: semestre,
                    iPorc: iPorc
                },
                success: function(datos) {
                    if (datos = true) {
                        Swal.fire({
                            title: '<p class="title-principal text-uppercase">Mensaje</p>',
                            icon: 'success',
                            html: '<p class="text-uppercase title-principal">Datos ingresados correctamente.</p>',
                            confirmButtonColor: '#0d6efd',
                            confirmButtonText: 'OK',
                        }).then((resultado) => {
                            $(location).attr('href', '../../../?menu=logrosEstudiantes');
                        })

                    } else if (resultado.isDenied) {
                        Swal.fire('Operación Cancelada', 'info');
                    } else {}
                }
            })
        }
    });
}