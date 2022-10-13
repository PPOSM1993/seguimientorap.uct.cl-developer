<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 15-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE QUE EJECUTA EL PROCEDIMIENTO ALMACENADO PARA LAS ÁREAS DE INSTRUMENTOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/docs/public/config/conexion.php";

    $tins_codigo = isset($_POST['tins_codigo'])?$_POST['tins_codigo']:0;
    $estd_rut = isset($_POST['estd_rut'])?$_POST['estd_rut']:0;
    $estd_dv = isset($_POST['estd_dv'])?$_POST['estd_dv']:0;
    $estu_registro = isset($_POST['estu_registro'])?$_POST['estu_registro']:0;
    $carr_codigo = isset($_POST['carr_codigo'])?$_POST['carr_codigo']:0;
    $plan_codigo = isset($_POST['plan_codigo'])?$_POST['plan_codigo']:0;
    $prev_promedio_evaluacion = isset($_POST['prev_promedio_evaluacion'])?$_POST['prev_promedio_evaluacion']:0;
    $usuario_mod = 'usuarioprueba';
    
    try {
          $consulta = 
                "EXEC CELUCT.rap.mantennedorPromedio
                @accion = 'ingresar'
                @prev_codigo = '$prev_codigo',
                @tins_codigo = '$tins_codigo',
                @estd_rut = '$estd_rut',
                @estd_dv = '$estd_dv',
                @estu_registro = '$estu_registro',
                @carr_codigo = '$carr_codigo',
                @plan_codigo = '$plan_codigo',
                @prev_promedio_evaluacion = '$prev_promedio_evaluacion',
                @usuario_mod = '$usuario_mod'";

            $query = $conexion -> prepare($consulta);

            //SI SE EXECUTA LA CONSUTLA
            if($query -> execute()){
                echo '{"success": true}';
            } else {
                echo '{"success": false}';
            }
    } catch(PDOException $exception){
        die('ERROR: ' . $exception -> getMessage());
        echo '{"success": false}';
    }

?>