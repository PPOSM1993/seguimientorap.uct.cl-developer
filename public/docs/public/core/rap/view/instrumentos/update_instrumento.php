<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE REALIZAR LAS ACTUALIZACIONES A LOS INSTRUMENTOS DE EVALUACIÓN.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/docs/public/config/conexion.php";

    $tins_codigo = isset($_POST['instrumentoUpdate'])?$_POST['instrumentoUpdate']:'';
    $carr_codigo = isset($_POST['carreraUpdate'])?$_POST['carreraUpdate']:'';
    $plan_codigo = isset($_POST['planCarreraUpdate'])?$_POST['planCarreraUpdate']:'';
    $tins_descripcion = isset($_POST['tinsDescripcionUpdate'])?$_POST['tinsDescripcionUpdate']:'';
    $tins_porcentaje = isset($_POST['tinsPorcentajeUpdate'])?$_POST['tinsPorcentajeUpdate']:'';
    $tins_vigente = isset($_POST["tinsVigenteUpdate"])?$_POST["tinsVigenteUpdate"] : '';
    $tinsTexto = isset($_POST["tinsTexto"])?$_POST["tinsTexto"] : '';

    $usuario_mod = 'usuarioprueba';
    $tins_nombre = '';

    try {
        $consulta = "EXEC CELUCT.rap.mantenedorInstrumento
                        @accion = 'editar',
                        @tins_codigo = '$tins_codigo',
                        @carr_codigo = '$carr_codigo',
                        @plan_codigo = '$plan_codigo',
                        @tins_nombre = '$tinsTexto',
                        @tins_descripcion = '$tins_descripcion',
                        @tins_porcentaje = '$tins_porcentaje',
                        @tins_vigente = '$tins_vigente',
                        @usuario_mod = '$usuario_mod' ";

 $consulta;

            $query = $conexion -> prepare($consulta);

            //SI SE EXECUTA LA CONSUTLA
            if($query -> execute()) {
                '{"success": true}';
            } else {
                '{"success": false}';
            }
    } catch(PDOException $exception){
        die('ERROR: ' . $exception -> getMessage());
        echo '{"success": false}';
    }
