<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS REGIONES REGISTRADAS EN LA BASE DE DATOS
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    
    //GENERAMOS LA CONSULTA
    $region = "SELECT regi_codigo, regi_abreviacion ,regi_nombre
                    FROM CELUCT.dbo.vista_strap_regiones
                    WHERE regi_codigo NOT IN(0)";
    $query = $conexion -> prepare($region);
    $query -> execute();
    $dato_region = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_region as $datos):
        echo '<option value="'.$datos["regi_codigo"].'">'.$datos["regi_abreviacion"]. " Región de ".$datos["regi_nombre"].'</option>';
    endforeach;

?>