<?php
//
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";
?>

<!--Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right text-uppercase title-principal">
                    <li class="breadcrumb-item"><a>Registro áreas de evaluación </a></li>
                    <li class="breadcrumb-item"><a href="?menu=inicio">Inicio</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<!--End Content Header-->

<!--Título-->
<div class="col-sm-12">
    <h3 class="m-0 text-uppercase text-center title-principal">registro áreas de evaluación</h3>
    <div class="dropdown-divider"></div>
</div><!-- /.col -->
<!--Fin Título-->





<!--Formulario-->
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="frmAreas" name="frmAreas" action="" method="POST" class="frmAreas text-uppercase">
                    <div class="row">

                        <div class="col-sm-9 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">carrera(*)</label>
                                <select name="carrera" id="carrera" class="carrera selectOption form-control form-control-sm selectCarrera select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                    <?php
                                    //ARCHIVO QUE TRAE LAS CARRERAS REGISTRADAS
                                    include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/areas/query/carrera.php";
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 title-principal">
                            <div class="form-group">
                                <label>plan carrera(*)</label>
                                <select name="planCarrera" id="planCarrera" class="selectOption form-control form-control-sm planCarrera select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                    <?php
                                    // ARCHIVO QUE TRAE LOS PLANES DE CARRERA
                                    include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/areas/query/plan_carrera.php";
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">instrumento(*)</label>

                            </div>
                        </div>

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase">área de evaluación(*)</label>
                                <br>
                                <input type="text" class="form-control form-control-sm text-uppercase areaEvaluacion" id="areaEvaluacion" name="areaEvaluacion" placeholder="ingrese área evaluación">
                            </div>
                        </div>

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase">descripción</label>
                                <textarea name="rearNombreDescripcion" id="rearNombreDescripcion" placeholder="Ingrese Descripción" cols="10" rows="5" class="rearNombreDescripcion form-control tinsDescripcion text-uppercase title-principal"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center title-principal">
                        <button id="btnSave" type="button" class="btnSave btn btn-success text-uppercase" onclick="validaFormArea();"><i class="fa fa-save"></i> guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Fin Formulario-->