<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/modulo_uct_rap/docs/public/config/conexion.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/modulo_uct_rap/docs/public/core/rap/view/estudiantes/select_estudiante.php";
?>

<!--Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-uppercase title-principal" id="exampleModalLabel">buscar estudiante</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--Formulario-->
                                <div class="container-fluid">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form id="frmEstudiante" name="frmEstudiante" action="" method="POST" class="frmEstuidante text-uppercase">
                                                    <div class="row">

                                                        <div class="col-sm-9 title-principal">
                                                            <div class="form-group">
                                                                <label class="text-uppercase">carrera</label>
                                                                <input type="text" id="carrera" class="form-control form-control-sm" readonly="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 title-principal">
                                                            <div class="form-group">
                                                                <label>plan carrera</label>
                                                                <input type="text" id="planCarrera" class="form-control form-control-sm" readonly="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="dropdown-divider"></div>
                                                        </div>

                                                        <div class="col-sm-4 title-principal">
                                                            <div class="form-group">
                                                                <label>vía ingreso</label>
                                                                <input type="text" class="form-control form-control-sm" readonly="true">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4 title-principal">
                                                            <div class="form-group">
                                                                <label>condición admisión</label>
                                                                <input type="text" class="form-control form-control-sm" readonly="true">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2 title-principal">
                                                            <div class="form-group">
                                                                <label>año ingreso</label>
                                                                <input type="text" class="form-control form-control-sm" readonly="true">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2 title-principal">
                                                            <div class="form-group">
                                                                <label>sem. ingreso</label>
                                                                <input type="text" class="form-control form-control-sm" readonly="true">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="dropdown-divider"></div>
                                                        </div>

                                                        <div class="col-sm-5 title-principal">
                                                            <div class="form-group">
                                                                <label>Estudiante</label>
                                                                <input type="text" class="form-control form-control-sm" readonly="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 title-principal">
                                                            <div class="form-group">
                                                                <label>RUT</label>
                                                                <input type="text" class="form-control form-control-sm" readonly="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 title-principal">
                                                            <div class="form-group">
                                                                <label>código registro</label>
                                                                <input type="text" class="form-control form-control-sm" readonly="true">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12">
                                                            <div class="dropdown-divider"></div>
                                                        </div>


                                                    </div>
                                                    <div class="form-group text-center title-principal">
                                                        <button id="btnSave" type="button" class="btnSave btn btn-success text-uppercase"><i class="fa fa-save"></i> guardar</button>
                                                        <!--onclick="validaFormInstrumento();"-->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Formulario-->

                            </div>
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb float-sm-right text-uppercase title-principal">
                    <li class="breadcrumb-item"><a>consultar estudiantes </a></li>
                    <li class="breadcrumb-item"><a href="?menu=inicio">Inicio</a></li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>
<!--End Content Header-->
<!--Título-->
<div class="col-sm-12">
    <h3 class="m-0 text-uppercase text-center title-principal">registrar resultados de evaluación estudiante</h3>
</div><!-- /.col -->
<!--Fin Título-->
<div class="col-sm-12">
    <div class="dropdown-divider"></div>
</div>
<br>

<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="frmEstudiante" name="frmEstudiante" action="listarEstudiantes.php" method="POST" class="frmEstuidante text-uppercase">
                    <div class="row">
                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">buscar por(*)</label>
                                <select name="buscarPor" id="buscarPor" class="form-control form-control-sm buscarPor select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                    <option value="">RUT</option>
                                    <option value="">Nombre</option>
                                    <option value="">Año Cohorte</option>
                                    <option value="">Carrera</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">parámetro búsqueda(*)</label>
                                <input type="text" class="form-control form-control-sm" style="width:100%;">
                            </div>
                        </div>
                        <div class="col-sm-12 title-principal text-center">
                            <button type="button" class="btn btn-success title-principal text-uppercase">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table id="tblPostulantes" class="data-table table table-striped table-bordered title-principal">
                                        <thead class="text-center text-uppercase">
                                            <tr role="row">
                                                <th class="sorting text-uppercase">rut</th>
                                                <th class="sorting text-uppercase" aria-label="Browser: activate to sort column ascending">
                                                    Estudiante</th>
                                                <th class="sorting text-uppercase" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                    Carrera
                                                </th>
                                                <th class="sorting text-uppercase" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                    cond. admisión
                                                </th>
                                                <th class="sorting text-uppercase" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                    ingresar
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-uppercase">
                                            <?php foreach ($estudiantes as $estudiante) { ?>
                                                <tr role="row" class="text-left">
                                                    <td><?php echo $estudiante['estd_rut'] . "-" . $estudiante['estd_dv'] ?></td>
                                                    <td><?php echo $estudiante['estd_nombre1'] . " " . $estudiante['estd_nombre2'] . " " . $estudiante['estd_apellido1'] . " " .  $estudiante['estd_apellido2'] ?></td>
                                                    <td><?php echo $estudiante['carr_nombre'] ?></td>
                                                    <td><?php echo $estudiante['cadm_nombre'] ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info text-uppercase title-principal text-center" data-toggle="modal" data-target="#exampleModal">
                                                            <i class="fa fa-info"></i>
                                                        </button>
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
    </section>
</div>