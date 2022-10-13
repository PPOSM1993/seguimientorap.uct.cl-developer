<?php

/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 15-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE LISTAR LOS LOGROS DE CADA ESTUDIANTE.
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";

//GENERAMOS LA CONSULTA
//Código que permite asociar el las tablas de tipo instrumento y carrera para listar el nombre de la carrera, mediante una consulta SQL.

if(isset($_POST['estuRegistro'])) {

    $registro = $_POST['estuRegistro'];

$sentencia = $conexion->query("SELECT a.estd_rut, a.estd_dv, a.REGISTRO, a.carr_codigo, a.carr_nombre, a.plan_codigo, a.estu_anho_ing, 
                                a.salu_codigo, a.salu_nombre, a.estu_semestre_ing,
                                a.ving_codigo, a.ving_nombre, a.cadm_codigo, a.cadm_nombre, a.salu_codigo, a.salu_nombre,
                                b.estd_nombre1, b.estd_nombre2, b.estd_apellido1, b.estd_apellido2,
                                t.tins_codigo, t.tins_nombre,
                                r.rear_codigo, r.rear_nombre_area, 
                                c.evar_codigo, c.evar_evaluacion_concepto,
                                c.evar_porcentaje_logro, c.evar_anho_evaluacion ,c.evar_semestre_evaluacion
                                FROM CELUCT.dbo.vista_strap_estudiante_carrera
                                AS a INNER JOIN CELUCT.dbo.vista_strap_estudiante AS b ON (b.estd_rut = a.estd_rut AND b.estd_dv = a.estd_dv)
                                INNER JOIN CELUCT.rap.tipo_instrumento AS t ON t.carr_codigo = a.carr_codigo
                                INNER JOIN CELUCT.rap.registro_area_instrumento AS r ON r.tins_codigo = t.tins_codigo
                                INNER JOIN CELUCT.rap.evaluacion_area AS c ON c.estd_rut = a.estd_rut AND c.estd_dv = a.estd_dv
                                AND c.rear_codigo = r.rear_codigo
                                WHERE a.cadm_codigo IN (48,49, 64, 65, 66, 67) AND a.REGISTRO = '$registro'
                                ORDER BY a.cadm_codigo;");

$logros = $sentencia->fetchAll();

}

?>