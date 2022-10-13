<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 15-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE LISTAR LOS INSTRUMENTOS Y SUS CARRERAS AOSCIADAS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/docs/public/config/conexion.php";

    //GENERAMOS LA CONSULTA
    //Código que permite asociar el las tablas de tipo instrumento y carrera para listar el nombre de la carrera, mediante una consulta SQL.

    $sentencia = $conexion->query("SELECT a.rear_codigo, a.rear_nombre_area, a.tins_codigo, a.rear_vigente, a.rear_descripcion_area,
                                    b.tins_nombre, b.carr_codigo, c.carr_nombre, b.plan_codigo
                                    FROM CELUCT.rap.registro_area_instrumento AS a
                                    INNER JOIN CELUCT.rap.tipo_instrumento AS b ON (b.tins_codigo = a.tins_codigo)
                                    INNER JOIN CELUCT.dbo.vista_strap_carrera_programa AS c ON (c.carr_codigo = b.carr_codigo);");
    $areas = $sentencia->fetchAll();
