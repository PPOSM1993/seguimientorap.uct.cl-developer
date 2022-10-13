<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS NACIONALIDADES REGISTRADAS
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    
    //GENERAMOS LA CONSULTA
    $nacionalidad = "SELECT naci_codigo_nacionalidad, naci_nombre_nacionalidad
                    FROM CELUCT.dbo.vista_strap_nacionalidad
                    WHERE naci_codigo_nacionalidad IN (1,2)";
    $query = $conexion -> prepare($nacionalidad);
    $query -> execute();
    $dato_nacion = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_nacion as $datos):
        echo '<option value="'.$datos["naci_codigo_nacionalidad"].'">'.$datos["naci_nombre_nacionalidad"].'</option>';
    endforeach;

?>