<?php

/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 15-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE QUE EJECUTA EL PROCEDIMIENTO ALMACENADO PARA LAS ACCIONES DE NIVELACIÓN.
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";

$tins_codigo = isset($_POST['tins_codigo']) ? $_POST['tins_codigo'] : 0;
$aniv_anho_cohorte = isset($_POST['aniv_anho_cohorte']) ? $_POST['aniv_anho_cohorte'] : 0;
$aniv_descripcion = isset($_POST['aniv_descripcion']) ? $_POST['aniv_descripcion'] : 0;
$aniv_observacion = isset($_POST['aniv_observacion']) ? $_POST['aniv_observacion'] : 0;
//$aniv_anho_nivelacion = isset($_POST['aniv_anho_nivelacion']) ? $_POST['aniv_anho_nivelacion'] : 0;
//$aniv_semestre_nivelacion = isset($_POST['aniv_semestre_nivelacion']) ? $_POST['aniv_semestre_nivelacion'] : 0;
$usuario_mod = 'usuarioprueba';

try {
        $consulta = "EXEC CELUCT.rap.MantenedorAcciones
                        @accion = 'ingresar',
                        @aniv_codigo  = '',
                        @tins_codigo = '$tins_codigo',
                        @aniv_anho_cohorte = '$aniv_anho_cohorte',
                        @aniv_descripcion = '$aniv_descripcion',
                        @aniv_observacion = '$aniv_observacion',
                        @usuario_mod = '$usuario_mod'";

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
