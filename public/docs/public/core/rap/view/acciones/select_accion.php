<?php

/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 15-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE LISTAR LAS ACCIONES DE NIVELACIÓN.
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";

//GENERAMOS LA CONSULTA
//Código que permite asociar el las tablas de tipo instrumento y carrera para listar el nombre de la carrera, mediante una consulta SQL.

$sentencia =  $conexion->query("SELECT a.aniv_codigo, a.aniv_anho_cohorte, a.aniv_descripcion, a.aniv_observacion, 
                                    a.aniv_anho_nivelacion, a.aniv_semestre_nivelacion,
                                    b.tins_codigo, b.tins_nombre, b.tins_vigente,
                                    c.carr_codigo, c.carr_nombre
                                    FROM CELUCT.rap.acciones_nivelacion
                                    AS a INNER JOIN CELUCT.rap.tipo_instrumento AS b ON (a.tins_codigo = b.tins_codigo)
                                    INNER JOIN CELUCT.dbo.vista_strap_carrera_programa AS c ON (b.carr_codigo = c.carr_codigo)
                                    WHERE tins_vigente = 'S'");

$acciones = $sentencia->fetchAll();
