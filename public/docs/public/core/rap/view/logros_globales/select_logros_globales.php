<?php

/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 15-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE LISTAR LOS LOGROS DE CADA ESTUDIANTE.
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";


$where = '';
if (isset($_POST)) {

    $dato = isset($_POST['datoBuscar']) ? $_POST['datoBuscar'] : null;
    $donde = isset($_POST['boton']) ? $_POST['boton'] : null;

    if ($donde == 1) {
        $where = " WHERE a.carr_codigo = " . $dato;
    } else if ($donde == 2) {
        $where = " WHERE a.estu_anho_ing = " . $dato;
    } else if ($donde == 3) {
        $where = " WHERE a.cadm_codigo = " . $dato;
    }


    $sentencia = $conexion->query("SELECT a.estd_rut, a.estd_dv, a.REGISTRO, a.carr_codigo, a.carr_nombre, a.plan_codigo, 
                                    a.estu_anho_ing, a.salu_codigo, a.salu_nombre, a.estu_semestre_ing,
                                    a.ving_codigo, a.ving_nombre, a.cadm_codigo, a.cadm_nombre,
                                    b.estd_nombre1, b.estd_nombre2, b.estd_apellido1, b.estd_apellido2,
                                    c.evar_codigo, c.evar_porcentaje_logro, c.evar_anho_evaluacion, c.evar_semestre_evaluacion,
                                    d.prev_codigo, d.prev_promedio_evaluacion,
                                    e.tins_codigo, e.tins_nombre,
                                    f.rear_codigo, f.rear_nombre_area
                                    FROM CELUCT.dbo.vista_strap_estudiante_carrera 
                                    AS a INNER JOIN CELUCT.dbo.vista_strap_estudiante AS b ON (b.estd_rut = a.estd_rut AND b.estd_dv = a.estd_dv)
                                    INNER JOIN CELUCT.rap.evaluacion_area AS c ON (c.estd_rut = a.estd_rut AND c.estd_dv = b.estd_dv)
                                    INNER JOIN CELUCT.rap.promedio_evaluacion_area AS d ON (d.estd_rut = a.estd_rut AND d.estd_dv = b.estd_dv)
                                    INNER JOIN CELUCT.rap.tipo_instrumento AS e ON (e.tins_codigo = c.tins_codigo)
                                    INNER JOIN CELUCT.rap.registro_area_instrumento AS f ON (f.rear_codigo = c.rear_codigo)" . $where);


    $logros = $sentencia->fetchAll();


    if (count($logros) > 0) {
        foreach ($logros as $logro) {

            $datos =
                $logro[0] . "||" .
                $logro[1] . "||" .
                $logro[2] . "||" .
                $logro[3] . "||" .
                $logro[4] . "||" .
                $logro[5] . "||" .
                $logro[6] . "||" .
                $logro[7] . "||" .
                $logro[8] . "||" .
                $logro[9] . "||" .
                $logro[10] . "||" .
                $logro[11] . "||" .
                $logro[12] . "||" .
                $logro[13] . "||" .
                $logro[14] . "||" .
                $logro[15] . "||" .
                $logro[16] . "||" .
                $logro[17] . "||" .
                $logro[18] . "||" .
                $logro[19] . "||" .
                $logro[20] . "||" .
                $logro[21] . "||" .
                $logro[22] . "||" .
                $logro[23] . "||" .
                $logro[24] . "||" .
                $logro[25] . "||" .
                $logro[26] . "||" .
                $logro[27];

            echo '<tr class="text-uppercase" role="row">
                    <td class="text-left">' . $logro['estd_rut'] . "-" . $logro['estd_dv'] . '</td>
                    <td class="text-left">' . $logro['estd_nombre1'] . " " . $logro['estd_nombre2'] . " " . $logro['estd_apellido1'] . " " . $logro['estd_apellido2'] . '</td>
                    <td class="text-left">' . $logro['carr_codigo'] . "-" . $logro['carr_nombre'] . '</td>
                    <td class="text-left">' . $logro['estu_anho_ing'] . '</td>
                    <td class="text-left">' . $logro['cadm_nombre'] . '</td>
                    <td class="text-left">' . $logro['tins_nombre'] . '</td>
                  </tr>';
        }
    } else {
        echo '
        <tr class="text-uppercase" role="row">
            <td colspan=7 class="text-center">
                No existe información con el dato solicitado
            </td>
        </tr>';
    }
}

?>