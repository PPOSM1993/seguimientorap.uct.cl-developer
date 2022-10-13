<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";
?>

<!--Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right text-uppercase title-principal">
                    <li class="breadcrumb-item"><a>Registro instrumentos </a></li>
                    <li class="breadcrumb-item"><a href="?menu=inicio">Inicio</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<!--End Content Header-->
<!--Título-->
<div class="col-sm-12">
    <h3 class="m-0 text-uppercase text-center title-principal">registro de instrumento de evaluación</h3>
</div><!-- /.col -->
<p></p>
<!--Fin Título-->
<!--Formulario-->
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="frmInstrumentos" name="frmInstrumentos" action="" method="POST" class="frmInstrumentos text-uppercase">
                    <div class="row">
                        <div class="col-sm-9 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">carrera(*)</label>
                                <select class=" carrera selectOption form-control  form-control-sm selectCarrera select2-container select2 select2-primary text-uppercase" name="carrera" id="carrera" style="width:100%;" value="">
                                    <?php
                                    //ARCHIVO QUE TRAE LAS CARRERAS REGISTRADAS
                                    include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/instrumentos/query/carrera.php";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 title-principal">
                            <div class="form-group">
                                <label>plan carrera(*)</label>
                                <select name="planCarrera" id="planCarrera" style="width:100%;" class="planCarrera selectOption form-control form-control-sm planCarrera select2-container select2 select2-primary text-uppercase">
                                    <?php
                                    //ARCHIVO QUE TRAE LOS PLANES DE CARRERAS REGISTRADOS
                                    include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/instrumentos/query/plan_carrera.php";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-sm-10 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase">instrumento(*)</label>
                                <br>
                                <input type="text" class="tinsNombre form-control form-control-sm text-uppercase" id="instrumento" name="instrumento" placeholder="ingrese nombre instrumento">
                            </div>
                        </div>
                        <div class="col-sm-2 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase">porcentaje(*)</label>
                                <br>
                                <input type="text" class="tinsNombre form-control form-control-sm text-uppercase" id="instrumento" name="instrumento" placeholder="ingrese porcentaje">

                            </div>
                        </div>
                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase">descripción</label>
                                <textarea name="tinsDescripcion" id="tinsDescripcion" placeholder="Ingrese Descripción" cols="10" rows="5" class="form-control tinsDescripcion text-uppercase title-principal"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center title-principal">
                        <button id="btnSave" type="button" class="btnSave btn btn-success text-uppercase" onclick="validaFormInstrumento();"><i class="fa fa-save"></i> guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Fin Formulario-->