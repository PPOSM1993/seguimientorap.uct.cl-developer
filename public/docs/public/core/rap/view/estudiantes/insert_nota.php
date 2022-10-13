<?php

/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 16-098-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE QUE EJECUTA EL PROCEDIMIENTO ALMACENADO.
    ----------------------------------------------------------------------------------------------------------------*/

//LLAMAMOS AL ARCHIVO CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";

if (isset($_POST)) {
    $aDatos = json_decode($_POST['aDatos'], 1);


    $sRut = isset($_POST['estd_rut']) ? $_POST['estd_rut'] : 0;
    $estu_registro = isset($_POST['estu_registro']) ? $_POST['estu_registro'] : 0;
    $carr_codigo = isset($_POST['carr_codigo']) ? $_POST['carr_codigo'] : 0;
    $plan_codigo = isset($_POST['plan_codigo']) ? $_POST['plan_codigo'] : 0;
    $rear_codigo = isset($_POST['rear_codigo']) ? $_POST['rear_codigo'] : 0;
    $tins_codigo = isset($_POST['tins_codigo']) ? $_POST['tins_codigo'] : 0;
    $usuario_mod = 'usuarioprueba';
    
    $aRut = explode("-", $sRut);
    $estd_rut = $aRut[0];
    $estd_dv = $aRut[1];
    $consulta='';
    
    try {
        foreach ($aDatos as $aDato) {
         $consulta .= "EXEC CELUCT.rap.mantenedorEvaluacionArea
                    @accion = 'ingresar',
                    @evar_codigo = '',
                    @prev_codigo = '',
                    @rear_codigo = '" . $aDato['areaEvaluacion'] . "',
                    @tins_codigo = '$tins_codigo',
                    @estd_rut = '$estd_rut',
                    @estd_dv = '$estd_dv',
                    @estu_registro = '$estu_registro',
                    @carr_codigo = '$carr_codigo',
                    @plan_codigo = '$plan_codigo',
                    @evar_evaluacion_concepto = '" . $aDato['conceptoEvaluacion'] . "',
                    @evar_porcentaje_logro = '" . $aDato['logroArea'] . "',
                    @prev_promedio_evaluacion = '" . $aDato['logroObtenido'] . "',
                    @usuario_mod = '$usuario_mod'";

            $query = $conexion->prepare($consulta);
        }

        //SI SE EJECUTA LA CONSUTLA
        if ($query->execute()) {
            echo '{"success": true}';
        } else {
            echo '{"success": false}';
        }
    } catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
        echo '{"success": false}';
    }
}
