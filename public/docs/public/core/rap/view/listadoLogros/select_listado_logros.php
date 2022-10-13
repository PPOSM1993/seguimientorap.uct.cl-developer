<?php

/*---------------------------------------------------------------------------------------------------------------

    AUTOR: PEDRO PABLO OSORIO SAN MARTÍN
    FECHA CREACIÓN: 08-06-2022
    DESCRIPCIÓN: ARCHIVO PHP QUE LLAMA AL PROCEDIMIENTO ALMACENADO).
    
    ----------------------------------------------------------------------------------------------------------------*/

//LLAMAMOS A LA CONEXIÓN

include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";


$sentencia = $conexion->query("SELECT a.estd_rut, a.estd_dv, a.REGISTRO, a.carr_codigo, a.carr_nombre, a.plan_codigo, 
                                a.estu_anho_ing, a.salu_codigo, a.salu_nombre, a.estu_semestre_ing,
                                a.ving_codigo, a.ving_nombre, a.cadm_codigo, a.cadm_nombre,
                                b.estd_nombre1, b.estd_nombre2, b.estd_apellido1, b.estd_apellido2,
                                c.evar_codigo, c.evar_porcentaje_logro, c.evar_anho_evaluacion, c.evar_semestre_evaluacion, c.evcr_codigo,
                                d.prev_codigo, d.prev_promedio_evaluacion,
                                e.tins_codigo, e.tins_nombre,
                                f.rear_codigo, f.rear_nombre_area,
                                g.evcr_criterio, evcr_descripcion
                                FROM CELUCT.dbo.vista_strap_estudiante_carrera 
                                AS a INNER JOIN CELUCT.dbo.vista_strap_estudiante AS b ON (b.estd_rut = a.estd_rut AND b.estd_dv = a.estd_dv)
                                INNER JOIN CELUCT.rap.evaluacion_area AS c ON (c.estd_rut = a.estd_rut AND c.estd_dv = b.estd_dv)
                                INNER JOIN CELUCT.rap.promedio_evaluacion_area AS d ON (d.estd_rut = a.estd_rut AND d.estd_dv = b.estd_dv)
                                INNER JOIN CELUCT.rap.tipo_instrumento AS e ON (e.tins_codigo = c.tins_codigo)
                                INNER JOIN CELUCT.seg.evaluacion_criterio AS g ON (g.evcr_codigo = c.evcr_codigo)
                                INNER JOIN CELUCT.rap.registro_area_instrumento AS f ON (f.rear_codigo = c.rear_codigo)");

$listados = $sentencia->fetchAll();

?>