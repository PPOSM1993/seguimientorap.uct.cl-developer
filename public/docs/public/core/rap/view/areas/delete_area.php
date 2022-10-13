<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS CARRERAS REGISTRADAS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/docs/public/config/conexion.php";


        $rear_codigo = isset($_POST['item'])?$_POST['item']:'';
        $tins_codigo = isset($_POST['tins_codigo'])?$_POST['tins_codigo']:0;
        $rear_nombre_area = isset($_POST['rear_nombre_area'])?$_POST['rear_nombre_area']:0;
        $rear_descripcion_area = isset($_POST['rear_descripcion_area'])?$_POST['rear_descripcion_area']:0;
        $rear_vigente = isset($_POST['rear_vigente'])?$_POST['rear_vigente']:'';
        $usuario_mod = 'usuarioprueba';
        $vigente = 'N';
    
        try {
            $consulta = 
                "EXEC CELUCT.rap.mantenedorAreas
                @accion = 'eliminar',
                @rear_codigo = '$rear_codigo',
                @tins_codigo = '$tins_codigo',
                @rear_nombre_area = '$rear_nombre_area',
                @rear_descripcion_area = '$rear_descripcion_area',
                @rear_vigente = '$vigente',
                @usuario_mod = '$usuario_mod'";
    
                $query = $conexion -> prepare($consulta);
    
                //SI SE EXECUTA LA CONSUTLA
                if($query -> execute()){
                    '{"success": true}';
                } else {
                    '{"success": false}';
                }
        } catch(PDOException $exception){
            die('ERROR: ' . $exception -> getMessage());
                '{"success": false}';
        }

?>