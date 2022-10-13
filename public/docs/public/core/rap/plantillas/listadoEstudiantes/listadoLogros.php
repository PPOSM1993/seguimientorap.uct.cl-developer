<?php
/*---------------------------------------------------------------------------------------------------------------

    AUTOR: PEDRO PABLO OSORIO SAN MARTÍN
    FECHA CREACIÓN: 08-06-2022
    DESCRIPCIÓN: ARCHIVO PHP QUE LLAMA AL PROCEDIMIENTO ALMACENADO).
    
    ----------------------------------------------------------------------------------------------------------------*/

//LLAMAMOS A LA CONEXIÓN

include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/lib/session.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/listadoLogros/select_listado_logros.php";

//include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/instrumentos/delete_instrumento.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/instrumentos/update_instrumento.php";

?>

<!--FIN FORMULARIO TÍTULO INSTRUMENTOS DE EVALUACIÓN-->
<br>
<div class="col-12">
    <h3 class="m-0 text-uppercase text-center title-principal">LISTADO ESTUDIANTES</h3>
</div>
<br>
<div class="col-12">
    <div class="dropdown-divider"></div>
</div>

<br>
<div class="container-fluid title-principal">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="data-table table table-striped table-bordered table-responsive-xl title-principal listadoLogros text-uppercase" name="listadoLogros" id="listadoLogros">
                                <thead class="text-center text-uppercase">
                                    <tr role="row" style="background-color:#B2CDD3;">
                                        <th class=" text-uppercase">RUT</th>
                                        <th class=" text-uppercase">Nombre</th>
                                        <th class=" text-uppercase">Carrera</th>
                                        <th class=" text-uppercase">Plan Carrera</th>
                                        <th class=" text-uppercase">Año Ingreso</th>
                                        <th class=" text-uppercase text-center">OPCIONES</th>
                                    </tr>
                                </thead>

                                <tbody id="" class="text-uppercase cuerpo">
                                    <?php foreach ($listados as $listado) { ?>
                                        <tr role="row" class="text-left text-uppercase">
                                            <td><?php echo $listado['estd_rut'] ?></td>
                                            <td><?php echo $listado['estd_nombre1'] . " " . $listado['estd_nombre2'] . " " . $listado['estd_apellido1'] . " " . $listado['estd_apellido2'] ?></td>
                                            <td><?php echo $listado['carr_codigo'] . " - " . $listado['carr_nombre'] ?></td>
                                            <td><?php echo $listado['estu_anho_ing'] ?></td>
                                            <td><?php echo $listado['estu_semestre_ing'] ?></td>
                                            <td class="text-center">
                                                <a data-role="updateLogro" class="btn btn-warning" type="button" data-toggle="modal" aria-labelledby="mdlActualizarLogroLabel" aria-hidden="true" onclick="" data-target="#mdlActualizarLogro" id="">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a id="" class="btn btn-danger" type="">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--MODAL PARA LISTADO DE LOGROS ESTUDIANTES-->

<div class="modal fade" id="mdlActualizarLogro" tabindex="-1" aria-labelledby="mdlActualizarLogroLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-principal text-uppercase text-center" id="exampleModalLabel">editar logros estudiantes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="POST" id="formLogroEstudianteUpdate">
                                    <div class="row">
                                        <div class="col-sm-9 title-principal">
                                            <div class="form-group">
                                                <label class="text-uppercase">carrera</label>
                                                <input type="text" id="carrera" class="form-control carrera form-control-sm" readonly="true" name="carrera">
                                                <input type="hidden" id="cod_carrera" value="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 title-principal">
                                            <div class="form-group">
                                                <label class="text-uppercase">plan carrera</label>
                                                <input type="text" id="planCarrera2" class="form-control form-control-sm" readonly="true" class="planCarrera2" name="planCarrera2">
                                                <input type="hidden" id="carrera_plan2" class="form-control planCarrera form-control-sm" readonly="true" name="carrera_plan2">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="dropdown-divider"></div>
                                        </div>
                                        <div class="col-sm-4 title-principal">
                                            <div class="form-group">
                                                <label class="text-uppercase">vía ingreso</label>
                                                <input type="text" id="viaIngreso" class="form-control form-control-sm" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 title-principal">
                                            <div class="form-group">
                                                <label class="text-uppercase">condición admisión</label>
                                                <input type="text" id="condicionAdmision" class="form-control form-control-sm" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 title-principal">
                                            <div class="form-group">
                                                <label class="text-uppercase">año ingreso</label>
                                                <input type="text" id="anhoIngreso" class="form-control form-control-sm" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 title-principal">
                                            <div class="form-group">
                                                <label class="text-uppercase">sem. ingreso</label>
                                                <input type="text" id="semestre" class="form-control form-control-sm" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="dropdown-divider"></div>
                                        </div>
                                        <div class="col-sm-4 title-principal">
                                            <div class="form-group">
                                                <label class="text-uppercase">Estudiante</label>
                                                <input type="text" id="nombre" class="form-control form-control-sm" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 title-principal">
                                            <div class="form-group">
                                                <label class="text-uppercase">RUT</label>
                                                <input type="text" id="rut" class="form-control form-control-sm" readonly="true">
                                            </div>
                                        </div>
                                        <div class="col-sm-2 title-principal">
                                            <div class="form-group">
                                                <label class="text-uppercase">registro</label>
                                                <input id="estuRegistro" type="text" class="form-control form-control-sm" readonly="true">
                                            </div>
                                        </div>
                                        
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-center title-principal">
                <button type="button" class="btn btn-success text-uppercase">
                    <i class="fa fa-save"></i> Cambiar Datos
                </button>
            </div>
        </div>
    </div>
</div>

<!--FIN MODAL LISTADO LOGROS ESTUDIANTES-->