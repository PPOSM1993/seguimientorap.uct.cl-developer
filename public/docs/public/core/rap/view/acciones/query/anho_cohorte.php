<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LOS AÑOS DE INGRESO REGISTRADOS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    //GENERAMOS LA CONSULTA
    $anhoIngreso = "SELECT DISTINCT(estu_anho_ing) FROM CELUCT.dbo.vista_strap_estudiante_carrera";

    $query = $conexion -> prepare($anhoIngreso);
    $query -> execute();
    $dato_anho = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_anho as $datos):
        echo '<option value="'.$datos["estu_anho_ing"].'">'.$datos["estu_anho_ing"].'</option>';
    endforeach;
?>


