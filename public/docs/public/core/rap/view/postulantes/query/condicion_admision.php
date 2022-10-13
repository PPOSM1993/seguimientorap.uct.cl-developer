<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 07-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS CARRERAS REGISTRADAS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    $via_ingreso = $_POST["ving_codigo"];

    //GENERAMOS LA CONSULTA
    $condicion_admision = "SELECT cadm_codigo, cadm_nombre
                FROM CELUCT.dbo.vista_strap_condiciones_admision
                WHERE cadm_codigo IN(64, 65, 66, 67) AND ving_codigo = :ving_codigo";
    $query = $conexion -> prepare($condicion_admision);
    $query -> bindParam(':ving_codigo', $via_ingreso);
    $query -> execute();
    $dato_condicion_admision = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_condicion_admision as $datos):
        echo '<option value="'.$datos["cadm_codigo"].'">'.$datos["cadm_codigo"]." - ".$datos["cadm_nombre"].'</option>';
    endforeach;

?>