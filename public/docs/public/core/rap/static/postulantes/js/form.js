//Validaciones de Formulario Postulantes.

$(document).ready(function() {

    //Select2 para opciones de combo box.
    $('.selectOption').select2({
        placeholder: 'SELECCIONE UNA OPCIÓN',
        tags: true,
    }).on('select2:close', function() {

    });
});

//Limpiar Formulario Postulaciones
function limpiarFormularioPostulantes() {

}

//Validación RUT y DV


//Validar Formulario de Postulantes (campos vacíos):
function validaFormPostulante() {

    var nacionalidad = document.getElementById('nacionalidad').value;
    var numPasaporte = document.getElementById('numPasaporte').value;
    var rut = document.getElementById('rut').value;
    var dv = document.getElementById('dv').value;
    var primerNombre = document.getElementById('primerNombre').value;
    var apPaterno = document.getElementById('apPaterno').value;
    var fechaNacimiento = document.getElementById('fechaNacimiento').value;
    var sexo = document.getElementById('sexo').value;
    var correo = document.getElementById('correo').value;
    var telefonoPersonal = document.getElementById('telefonoPersonal').value;
    var direccionPersonal = document.getElementById('direccionPersonal').value;
    var region = document.getElementById('region').value;
    var comuna = document.getElementById('comuna').value;
    var provincia = document.getElementById('region').value;
    var carrera = document.getElementById('carrera').value;
    var viaIngreso = document.getElementById('viaIngreso').value;
    var selectCondicion = document.getElementById('selectCondicion').value;

    //Expresiones Regulares.
    var expresionEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    var expresionTelefono = /^(\+?56)?(\s?)(0?9)(\s?)[98765432]\d{7}$/;
    var expresionRUT = /^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/;
    var expresionDV = /^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/;
    var expresionPasaporte = /^(?!^0+$)[a-zA-Z0-9]{6,9}$/;

    //Validaciones para campos vacíos e identificación de campos mal escritos.
    if (nacionalidad == null || nacionalidad == '' || nacionalidad.length == 0 || /^\s+$/.test(nacionalidad)) {
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
            text: 'Formulario completado correctamente..',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (numPasaporte == null || numPasaporte == '' || numPasaporte.length == 0 || /^\s+$/.test(numPasaporte) || !(expresionPasaporte.test(numPasaporte))) {
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
            text: 'Formulario completado correctamente..',
            confirmButtonColor: '#0d6efd',
            confirmButtonText: 'OK'
        });
    }

    if (rut == null || rut == '' || rut.length == 0 || /^\s+$/.test(rut)) {
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

    if (dv == null || dv == '' || dv.length == 0 || /^\s+$/.test(dv)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores',
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

    if (primerNombre == null || primerNombre == '' || primerNombre.length == 0 || /^\s+$/.test(primerNombre)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores',
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

    if (apPaterno == null || apPaterno == '' || apPaterno.length == 0 || /^\s+$/.test(apPaterno)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (fechaNacimiento == null || fechaNacimiento == '' || fechaNacimiento.length == 0 || /^\s+$/.test(fechaNacimiento)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (sexo == null || sexo == '' || sexo.length == 0 || /^\s+$/.test(sexo)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (correo == null || correo == '' || correo.length == 0 || /^\s+$/.test(correo) || !(expresionEmail.test(correo))) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (telefonoPersonal == null || telefonoPersonal == '' || telefonoPersonal.length == 0 || /^\s+$/.test(telefonoPersonal) || isNaN(telefonoPersonal) || !expresionTelefono.test(telefonoPersonal)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (direccionPersonal == null || direccionPersonal == '' || direccionPersonal.length == 0 || /^\s+$/.test(direccionPersonal)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (provincia == null || provincia == '' || provincia.length == 0 || /^\s+$/.test(provincia)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (region == null || region == '' || region.length == 0 || /^\s+$/.test(region)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (comuna == null || comuna == '' || comuna.length == 0 || /^\s+$/.test(comuna)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (carrera == null || carrera == '' || carrera.length == 0 || /^\s+$/.test(carrera)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (viaIngreso == null || viaIngreso == '' || viaIngreso.length == 0 || /^\s+$/.test(viaIngreso)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    if (selectCondicion == null || selectCondicion == '' || selectCondicion.length == 0 || /^\s+$/.test(selectCondicion)) {
        Swal.fire({
            title: 'Mensaje',
            icon: 'error',
            text: 'El formulario está incompleto o algunos campos presentan errores.',
            footer: 'Verificar que esté todo correcto.',
            confirmButtonColor: '#F6170D',
            confirmButtonText: 'OK'
        });

        return false;

    } else {
        Swal.fire({
            title: 'Mensaje',
            icon: 'success',
            text: 'Formulario completado correctamente.',
            confirmButtonColor: '#00D24C',
            confirmButtonText: 'OK'
        });
    }

    return true;
}