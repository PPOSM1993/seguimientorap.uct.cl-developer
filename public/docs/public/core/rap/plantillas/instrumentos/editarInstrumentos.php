<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";
?>

<!--TÍTULO DE ACTUALIZACIÓN DE INSTRUMENTO DE EVALUACIÓN-->
<div class="col-sm-12">
    <h3 class="m-0 text-uppercase text-center title-principal">actualización de instrumento de evaluación</h3>
</div>
<!--FÍN TÍTULO EVALUACIÓN-->


<div id="prueba">
    <!--FORMULARIO PARA EDITAR O ACTUALIZAR INSTRUMENTO DE EVALAUCIÓN-->
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="frmInstrumentoActualizado" name="frmInstrumentoActualizado" action="" method="POST" class="frmInstrumentoActualizado text-uppercase">
                        <div class="row">
                            <div class="col-sm-7 title-principal">
                                <div class="form-group">
                                    <label class="text-uppercase">carrera(*)</label>
                                    <input type="text" class="carrera form-control form-control-sm text-uppercase" id="carrera" name="carrera" readonly="true">
                                </div>
                            </div>

                            <div class="col-sm-3 title-principal">
                                <div class="form-group">
                                    <label>plan carrera(*)</label>
                                    <input type="text" class="planCarrera form-control form-control-sm text-uppercase" id="planCarrera" name="planCarrera" readonly="true">
                                </div>
                            </div>

                            <div class="col-sm-2 title-principal">
                                <div class="form-group">
                                    <label for="" class="text-uppercase">vigencia(*)</label>
                                    <br>
                                    <input type="hidden" name="tins_codigo" id="tins_codigo" value="">
                                    <select name="tinsVigente" id="tinsVigente" style="width:100%;" class="tinsVigente form-control form-control-sm tinsVigente text-uppercase">
                                        <option value="S">S</option>
                                        <option value="N">N</option>
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
                            <button id="btnUpdate" type="button" class="btnSave btn btn-success text-uppercase" onclick="validaFormInstrumento();"><i class="fa fa-save"></i> guardar</button>
    
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--FIN FORMULARIO INSTRUMENTO DE EVALUACIÓN-->
</div>