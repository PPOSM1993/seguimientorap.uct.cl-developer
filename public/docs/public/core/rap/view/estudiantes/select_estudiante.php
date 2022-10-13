<?php

/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 15-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE PERMITE LISTAR LOS ESTUDIANTES CON LA CONDICIÓN ADMISIÓN ASOCIADA.
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";



$where = '';
if (isset($_POST)) {

    $dato = isset($_POST['datoBuscar']) ? $_POST['datoBuscar'] : null;
    $donde = isset($_POST['boton']) ? $_POST['boton'] : null;

    if ($donde == 1) {
        $where = " WHERE a.estd_rut = " . $dato;
    } else if ($donde == 2) {
        $where = " WHERE a.carr_codigo = " . $dato;
    } else if ($donde == 3) {
        $where = " WHERE a.estu_anho_ing = " . $dato;
    } else if ($donde == 4) {
        $where = " WHERE a.cadm_codigo = " . $dato;
    }

    $sentencia = $conexion->query("SELECT a.estd_rut, a.estd_dv, a.REGISTRO, a.carr_codigo, a.carr_nombre, a.plan_codigo, 
    a.estu_anho_ing, a.salu_codigo, a.salu_nombre, a.estu_semestre_ing,
    a.ving_codigo, a.ving_nombre, a.cadm_codigo, a.cadm_nombre, a.salu_codigo, a.salu_nombre, 
    b.estd_nombre1, b.estd_nombre2, b.estd_apellido1, b.estd_apellido2
    FROM CELUCT.dbo.vista_strap_estudiante_carrera 
    AS a INNER JOIN CELUCT.dbo.vista_strap_estudiante AS b ON (b.estd_rut = a.estd_rut AND b.estd_dv = a.estd_dv)" . $where);

    $estudiantes = $sentencia->fetchAll();
}



if (count($estudiantes) > 0) {
    foreach ($estudiantes as $estudiante) {

        $datos =
            $estudiante[0] . "||" .
            $estudiante[1] . "||" .
            $estudiante[2] . "||" .
            $estudiante[3] . "||" .
            $estudiante[4] . "||" .
            $estudiante[5] . "||" .
            $estudiante[6] . "||" .
            $estudiante[7] . "||" .
            $estudiante[8] . "||" .
            $estudiante[9] . "||" .
            $estudiante[10] . "||" .
            $estudiante[11] . "||" .
            $estudiante[12] . "||" .
            $estudiante[13] . "||" .
            $estudiante[14] . "||" .
            $estudiante[15] . "||" .
            $estudiante[16] . "||" .
            $estudiante[17] . "||" .
            $estudiante[18] . "||" .
            $estudiante[19];

        echo '<tr class="text-uppercase" role="row">
                    <td class="text-center">' . $estudiante['estd_rut'] . "-" . $estudiante['estd_dv'] . '</td>
                    <td class="">' . $estudiante['estd_nombre1'] . " " . $estudiante['estd_nombre2'] . " " . $estudiante['estd_apellido1'] . " " . $estudiante['estd_apellido2'] . '</td>
                    <td>' . $estudiante['carr_codigo'] . " - " . $estudiante['carr_nombre'] . '</td>
                    <td class="text-center">' . $estudiante['plan_codigo'] . '</td>
                    <td class="text-center">' . $estudiante['estu_anho_ing'] . '</td>
                    <td>' . $estudiante['cadm_codigo'] . " - "  . $estudiante['cadm_nombre'] . '</td>';
    }
} else {
    echo '<tr class="text-uppercase" role="row">
            <td colspan=7 class="text-center">
                No existe información con el dato solicitado
            </td>
          </tr>';
}

?>
    <td class="text-center">
        <button href="" class="btn btn-warning" data-toggle="modal" aria-labelledby="mdlActualizarEstudianteLabel" aria-hidden="true" id="" data-target="#mdlActualizarEstudiante" type="button" onclick="agregaEstudiante('<?php echo $datos ?>');">
            <i class="fa fa-info"></i>
        </button>
    </td>
</tr>