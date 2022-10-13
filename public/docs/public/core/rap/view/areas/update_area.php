<?php

/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE REALIZAR LAS ACTUALIZACIONES A LOS INSTRUMENTOS DE EVALUACIÓN.
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";

$rear_codigo = isset($_POST['areaUpdate']) ? $_POST['areaUpdate'] : '';
$tins_codigo = isset($_POST['instrumentoUpdate']) ? $_POST['instrumentoUpdate'] : '';
$rear_descripcion_area = isset($_POST['areaDescripcionUpdate']) ? $_POST['areaDescripcionUpdate'] : '';
$rear_vigente = isset($_POST["areaVigenteUpdate"]) ? $_POST["areaVigenteUpdate"] : '';
$areaTexto = isset($_POST["areaTexto"]) ? $_POST["areaTexto"] : '';
$usuario_mod = 'usuarioprueba';
$rear_nombre_area = '';


try {
    $consulta =
        "EXEC CELUCT.rap.mantenedorAreas
            @accion = 'editar',
            @rear_codigo = '$rear_codigo',
            @tins_codigo = '$tins_codigo',
            @rear_nombre_area = '$areaTexto',
            @rear_descripcion_area = '$rear_descripcion_area',
            @rear_vigente = '$rear_vigente',
            @usuario_mod = '$usuario_mod'";

    $consulta;
    $query = $conexion->prepare($consulta);

    //SI SE EXECUTA LA CONSUTLA
    if ($query->execute()) {
        '{"success": true}';
    } else {
        '{"success": false}';
    }
} catch (PDOException $exception) {
    die('ERROR: ' . $exception->getMessage());
    echo '{"success": false}';
}
