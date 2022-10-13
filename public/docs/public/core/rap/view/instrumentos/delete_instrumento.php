<?php

/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS CARRERAS REGISTRADAS EN LA BASE DE DATOS PARA SU ELIMINACIÓN.
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";

$tins_codigo = isset($_POST['item']) ? $_POST['item'] : '';
$carr_codigo = isset($_POST['carr_codigo']) ? $_POST['carr_codigo'] : 0;
$plan_codigo = isset($_POST['plan_codigo']) ? $_POST['plan_codigo'] : 0;
$tins_nombre = isset($_POST['tins_nombre']) ? $_POST['tins_nombre'] : 0;
$tins_descripcion = isset($_POST['tins_descripcion']) ? $_POST['tins_descripcion'] : 0;
$tins_porcentaje = isset($_POST['tins_porcentaje']) ? $_POST['tins_porcentaje'] : 0;
$tins_vigente = isset($_POST['tins_vigente']) ? $_POST['tins_vigente'] : '';
$usuario_mod = 'usuarioprueba';


$pregunta  = "SELECT rear_codigo FROM CELUCT.rap.registro_area_instrumento WHERE tins_codigo = :tins_codigo";

$query = $conexion->prepare($pregunta);

$query->bindParam(':tins_codigo', $tins_codigo);
$query->execute();
$dato_consulta = $query->fetch();

//echo $dato_consulta;


if ($dato_consulta > 0) {

     0; //existe información asociada
} else {
    try {
        $consulta =
            "EXEC CELUCT.rap.mantenedorInstrumento
            @accion = 'eliminar',
            @tins_codigo = '$tins_codigo',
            @carr_codigo = '$carr_codigo',
            @plan_codigo = '$plan_codigo',
            @tins_nombre = '$tins_nombre',
            @tins_descripcion = '$tins_descripcion',
            @tins_porcentaje = '$tins_porcentaje',
            @tins_vigente = '$tins_vigente',
            @usuario_mod = '$usuario_mod'";

        $query = $conexion->prepare($consulta);

        //SI SE EXECUTA LA CONSUTLA
        if ($query->execute()) {
              2; // se ejecutó correctamente
        } else {
              1; //no se pudo ejecutar
        }
    } catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
         3; // error de conexión
    }
}
