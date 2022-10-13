<?php
//header("Content-Type: text/Csv; meta charset=UTF-8 ");
//header("Content-Disposition", "attachment;filename=myfilename.csv");

header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=filename.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php

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


$logros = $sentencia->fetchAll();

?>


<br>
<h1>CELUCT - INFORME DE RESULTADOS POR ESTUDIANTE</h1>
<table id="tblLogrosEstudiantes" class="data-table table table-info table-striped table-bordered table-responsive-xl title-principal tblLogrosEstudiantes display">

    <thead class="text-uppercase">
        <tr role="row" class="title-principal" style="background-color:#689FDA; font-size:20px;">
            <th class="sorting text-uppercase" style=" text-align: left;">EVALUACIÓN</th>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </thead>

    <tbody id="divresultadoLogros">
        <?php foreach ($logros as $logro) { ?>
        <?php  } ?>
        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">

            <th class="sorting text-uppercase" style="text-align: left;">INSTRUMENTO EVALUACIÓN</th>
            <td class="text-uppercase" style="text-align: left;"><?php echo $logro['tins_nombre']  ?></td>
            <td></td>
            <td></td>

        </tr>
        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">
            <th class="sorting text-uppercase text-left" style=" text-align: left;">CARRERA</th>
            <td class="text-uppercase text-left" style="text-align: left;"><?php echo $logro['carr_codigo'] . "-" . $logro['carr_nombre']  ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">
            <th class="sorting text-uppercase text-left" style=" text-align: left;">PLAN</th>
            <td class="text-uppercase text-left " style="text-align: left;"><?php echo $logro['plan_codigo']  ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">
            <th class="sorting text-uppercase text-left" style="text-align: left;">AÑO EVALUACIÓN</th>
            <td class="text-uppercase text-left" style="text-align: left;"><?php echo $logro['evar_anho_evaluacion']  ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">
            <th class="sorting text-uppercase text-left" style=" text-align: left;">SEMESTRE EVALUACIÓN</th>
            <td class="text-uppercase text-left" style=" text-align: left;"><?php echo $logro['evar_semestre_evaluacion']  ?></td>
            <td></td>
            <td></td>
        </tr>

        <tr role="row"></tr>

        <tr role="row" class="title-principal" style="background-color:#689FDA; font-size:20px;">
            <th class="sorting text-uppercase" style=" text-align: left;">DATOS ESTUDIANTE</th>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">
            <th class="sorting text-uppercase" style="text-align: left;">NOMBRE ESTUDIANTE</th>
            <td class="text-uppercase" style=" text-align: left;"><?php echo $logro['estd_nombre1'] . " " . $logro['estd_nombre2'] . " " . $logro['estd_apellido1'] . " " . $logro['estd_apellido2'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">
            <th class="sorting text-uppercase" style="text-align: left;">RUT</th>
            <td class="text-uppercase" style=" text-align: left;"><?php echo $logro['estd_rut'] . "-" . $logro['estd_dv'] ?></td>
            <td></td>
            <td></td>
        </tr>
        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">
            <th class="sorting text-uppercase" style="text-align: left;">REGISTRO</th>
            <td class="text-uppercase" style=" text-align: left;"><?php echo $logro['REGISTRO'] ?></td>
            <td></td>
            <td></td>
        </tr>

        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">
            <th class="sorting text-uppercase" style="text-align: left;">AÑO INGRESO</th>
            <td class="text-uppercase" style=" text-align: left;"><?php echo $logro['estu_anho_ing'] ?></td>
            <td></td>
            <td></td>
        </tr>

        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">
            <th class="sorting text-uppercase" style="text-align: left;">SEMESTRE INGRESO</th>
            <td class="text-uppercase" style=" text-align: left;"><?php echo $logro['estu_semestre_ing'] ?></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>

    <tfoot>
        <tr role="row"></tr>

        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#689FDA; font-size: 20px;">
            <th class="text-uppercase" style=" text-align: left;">RESULTADOS</th>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#689FDA; font-size: 15px;">
            <th class="text-uppercase" style=" text-align: left;">ÁREAS EVALUADAS</th>
            <th class="text-uppercase" style=" text-align: left;">PORCENTAJE OBTENIDO</th>
            <th class="text-uppercase" style=" text-align: left;">CRITERIO LOGRADO</th>
            <th></th>
        </tr>

        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#FCFCD9; font-size: 15px;">
            <td class="text-uppercase" style=" text-align: left;"><?php echo $logro['rear_nombre_area'] ?></td>
            <td class="text-uppercase" style=" text-align: left;"><?php echo $logro['evar_porcentaje_logro'] ?>%</td>
            <td class="text-uppercase" style=" text-align: left;"><?php echo $logro['evcr_criterio'] ?></td>
            <td></td>
        </tr>

        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#689FDA; font-size: 15px;">
            <th class="text-uppercase" style="text-align: left;">PROMEDIO LOGRO</th>
            <td class="text-uppercase" style="text-align: left;"><?php echo $logro['prev_promedio_evaluacion'] ?>%</td>
            <td class="text-uppercase" style=" text-align: left;"><?php echo $logro['evcr_criterio'] ?></td>
            <th class="text-uppercase"></th>
        </tr>

        <tr role="row"></tr>
        <tr role="row" class="text-uppercase cuerpo title-principal" style="background-color:#689FDA; font-size: 20px;">
            <th class="text-uppercase" style="text-align:left">DESCRIPCIÓN DESEMPEÑO</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

        <tr role="row" class="text-uppercase cuerpo" style="background-color:#FCFCD9; font-size: 15px;">
            <th class="text-uppercase" style="text-align:left"><?php echo $logro['evcr_descripcion'] ?></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>