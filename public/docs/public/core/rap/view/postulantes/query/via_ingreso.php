<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 07-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS VÍAS DE INGRESO REGISTRADAS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';
    
    //GENERAMOS LA CONSULTA
    $via_ingreso = "SELECT ving_codigo, ving_nombre
                    FROM CELUCT.dbo.vista_strap_vias_ingreso
                    WHERE ving_codigo = 2";
    $query = $conexion -> prepare($via_ingreso);
    $query -> execute();
    $dato_via_ingreso = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_via_ingreso as $datos):
        echo '<option value="'.$datos["ving_codigo"].'">'.$datos["ving_codigo"]. " - " .$datos["ving_nombre"].'</option>';
    endforeach;

?>