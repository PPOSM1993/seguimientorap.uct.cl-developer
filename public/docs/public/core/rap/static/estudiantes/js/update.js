//FUNCIÓN QUE AGREGA LOS DATOS AL MODAL DE LOS LOGROS DE LOS ESTUDIANTES.
function agregaEstudiantes(datos) {
    d = datos.split('||');

    carrera = $("carreraUpdate").val(d[3] + " - " + d[4]);
    carr_hidden = $("#cod_carrera").val(d[3]);

}

//FUNCIÓN QUE PERMITE VALIDAR LA ACTUALIZACIÓN  DE LOS LOGROS
function validaActualizacionLogros() {

}