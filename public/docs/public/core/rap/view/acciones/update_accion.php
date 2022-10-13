<?php

/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE REALIZAR LAS ACTUALIZACIONES A LOS INSTRUMENTOS DE EVALUACIÓN.
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";

$aniv_codigo = isset($_POST['accionUpdate']) ? $_POST['accionUpdate'] : '';
//$aniv_codigo = isset($_POST['']) ? $_POST[''] : '';
$tins_codigo = isset($_POST['tinsNombreUpdate']) ? $_POST['tinsNombreUpdate'] : '';
$aniv_anho_cohorte = isset($_POST['anivAnhoCohorteUpdate']) ? $_POST['anivAnhoCohorteUpdate'] : '';
$aniv_descripcion = isset($_POST["anivDescripcionUpdate"]) ? $_POST["anivDescripcionUpdate"] : '';
$aniv_observacion = isset($_POST["anivObservacionUpdate"]) ? $_POST["anivObservacionUpdate"] : '';
$usuario_mod = 'usuarioprueba';

try {
    $consulta = "EXEC CELUCT.rap.MantenedorAcciones
                    @accion = 'editar',
                    @aniv_codigo  = '$aniv_codigo',
                    @tins_codigo = '$tins_codigo',
                    @aniv_anho_cohorte = '$aniv_anho_cohorte',
                    @aniv_descripcion = '$aniv_descripcion',
                    @aniv_observacion = '$aniv_observacion',
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
