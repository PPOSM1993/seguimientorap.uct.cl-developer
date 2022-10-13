<?php

/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 15-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE QUE EJECUTA EL PROCEDIMIENTO ALMACENADO PARA LAS ÁREAS DE INSTRUMENTOS.
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";

$tins_codigo = isset($_POST['tins_codigo']) ? $_POST['tins_codigo'] : 0;
$rear_nombre_area = isset($_POST['rear_nombre_area']) ? $_POST['rear_nombre_area'] : 0;
$rear_descripcion_area = isset($_POST['rear_descripcion_area']) ? $_POST['rear_descripcion_area'] : 0;
$rear_vigente = isset($_POST['rear_vigente']) ? $_POST['rear_vigente'] : '';
$usuario_mod = 'usuarioprueba';

try {
    $consulta =
        "EXEC CELUCT.rap.mantenedorAreas
            @accion = 'ingresar',
            @rear_codigo = '',
            @tins_codigo = '$tins_codigo',
            @rear_nombre_area = '$rear_nombre_area',
            @rear_descripcion_area = '$rear_descripcion_area',
            @rear_vigente = '$rear_vigente',
            @usuario_mod = '$usuario_mod'";

    $query = $conexion->prepare($consulta);

    //SI SE EXECUTA LA CONSUTLA
    if ($query->execute()) {
        echo '{"success": true}';
    } else {
        echo '{"success": false}';
    }
} catch (PDOException $exception) {
    die('ERROR: ' . $exception->getMessage());
    echo '{"success": false}';
}
