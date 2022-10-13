<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS CONDICIONES DE ADMISIÓN REGISTRADAS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    //GENERAMOS LA CONSULTA
    $condicion_admision = "SELECT cadm_codigo, cadm_nombre FROM CELUCT.dbo.vista_strap_condiciones_admision WHERE cadm_codigo IN (48,49, 64, 65, 66, 67);";
    $query = $conexion -> prepare($condicion_admision);
    $query -> execute();
    $dato_condicion = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_condicion as $datos):
        echo '<option value="'.$datos["cadm_codigo"].'">'.$datos["cadm_codigo"]. " - "  .$datos["cadm_nombre"].'</option>';
    endforeach;
?>