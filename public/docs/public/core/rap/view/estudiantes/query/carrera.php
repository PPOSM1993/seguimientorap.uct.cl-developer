<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS CARRERAS REGISTRADAS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    //GENERAMOS LA CONSULTA
    $carrera = "SELECT carr_codigo, carr_nombre 
                FROM CELUCT.dbo.vista_strap_carrera_programa 
                WHERE carr_codigo NOT IN(0, 421) AND carr_vigente = 'S' ORDER BY carr_nombre ASC";

    $query = $conexion -> prepare($carrera);
    $query -> execute();
    $dato_nacion = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_nacion as $datos):
        echo '<option value="'.$datos["carr_codigo"].'">'.$datos["carr_codigo"]. " - "  .$datos["carr_nombre"].'</option>';
    endforeach;
?>


