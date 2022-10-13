<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 05-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE LISTAR LOS INSTRUMENTOS Y SUS CARRERAS AOSCIADAS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/docs/public/config/conexion.php";

        //GENERAMOS LA CONSULTA
    

    //Código que permite asociar el las tablas de tipo instrumento y carrera para listar el nombre de la carrera, mediante una consulta SQL.

    $sentencia = $conexion->query("SELECT * FROM rap.tipo_instrumento AS a INNER JOIN CELUCT.dbo.vista_strap_carrera_programa 
    AS b ON b.carr_codigo = a.carr_codigo AND b.carr_nombre = b.carr_nombre");

    
    $instrumentos = $sentencia->fetchAll();
?>