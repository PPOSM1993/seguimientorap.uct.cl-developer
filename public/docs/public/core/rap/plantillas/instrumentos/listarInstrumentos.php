<?php
/*---------------------------------------------------------------------------------------------------------------

    AUTOR: PEDRO PABLO OSORIO SAN MARTÍN
    FECHA CREACIÓN: 08-06-2022
    DESCRIPCIÓN: ARCHIVO PHP QUE LLAMA AL PROCEDIMIENTO ALMACENADO).
    
    ----------------------------------------------------------------------------------------------------------------*/

//LLAMAMOS A LA CONEXIÓN

include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/lib/session.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/instrumentos/select_instrumento.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/instrumentos/delete_instrumento.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/instrumentos/update_instrumento.php";

/*session_start();

$rut_usu =  $_SESSION["_RUT"];
$nombre_usuario = '';

//GENERAMOS LA CONSULTA
$instrumento = "SELECT mper_nombres+' '+mper_apellido_paterno+' '+mper_apellido_materno AS nombre
FROM  comun.dbo.maestro_personas
WHERE mper_rut =:rut_usu";

$query = $conexion->prepare($instrumento);

$query->bindParam(':rut_usu', $rut_usu);
$query->execute();
$dato_sesion = $query->fetchAll(PDO::FETCH_ASSOC);

$nombre_usuario = $dato_sesion['nombre'];

foreach ($dato_sesion as $datos) :
    $nombre_usuario = $datos['nombre'];
endforeach;*/


?>



<!--TÍTULO DE REGISTRO DE FORMULARIO DE ISNTRUMENTOS DE EVALUACIÓN-->
<div class="col-sm-12">
    <br>
    <h3 class="m-0 text-uppercase text-center title-principal">registro de instrumento de evaluación</h3>
</div>
<br>
<!--FIN FORMULARIO TÍTULO INSTRUMENTOS DE EVALUACIÓN-->

<!--INCIO DE FORMULARIO DE INSTRUMENTO DE EVALUACIÓN-->
<div class="container-fluid title-principal">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <form id="frmInstrumentos" name="frmInstrumentos" action="" method="POST" class="frmInstrumentos text-uppercase">
                    <div class="row">

                        <div class="col-sm-9 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase" style="font-size:14px;">carrera</label>
                                <select class="carrera selectOption form-control form-control-sm selectCarrera select2-container select2 select2-primary text-uppercase" name="carrera" id="carrera" style="width:100%;" value="">
                                    <?php
                                    //ARCHIVO QUE TRAE LAS CARRERAS REGISTRADAS
                                    include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/instrumentos/query/carrera.php";
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 title-principal">
                            <div class="form-group">
                                <label style="font-size:14px;">plan carrera</label>
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

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">nombre instrumento</label>
                                <br>
                                <input type="text" class="tinsNombre form-control form-control-sm text-uppercase" id="instrumento" name="instrumento" placeholder="ingrese nombre instrumento">
                            </div>
                        </div>

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">descripción</label>
                                <textarea name="tinsDescripcion" id="tinsDescripcion" placeholder="Ingrese Descripción" cols="10" rows="3" class="form-control tinsDescripcion text-uppercase title-principal">
                                </textarea>
                                <br>
                                <div id="contador">
                                    <p class="title-principal error-msg" style="font-weight:bold; color:red; font-size:14px; float:left; display:none;">
                                        Total Caracteres Excedidos
                                    </p>
                                    <p style="text-align:right; font-weight:bold; font-size:14px;" id="contadorCaracteres" style="float:right;">0 / 250</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">porcentaje:</label>
                            </div>
                        </div>
                        <div class="col-sm-1 title-principal">
                            <input type="number" class="tinsPorcentaje form-control form-control-sm text-uppercase" id="tinsPorcentaje" name="tinsPorcentaje" onkeydown="cien();">
                        </div>
                        <div class="col-sm-3 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">porcentaje restante:</label>
                            </div>
                        </div>
                        <div class="col-sm-1 title-principal cuerpo">

                            <button type="button" class="text-center tinsRestante btn btn-success text-uppercase title-principal" id="tinsRestante" onclick="restarPorcentaje();">
                                100
                            </button>
                            <!--
                            <p class="text-center tinsRestante" id="tinsRestante"></p>-->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="dropdown-divider"></div>
                    </div>
                    <br>
                    <div class="form-group text-center title-principal">
                        <button id="btnSave" type="button" class="btnSave btn btn-success text-uppercase" onclick="validaFormInstrumento();"><i class="fa fa-save"></i> guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--FIN FORMULARIO DE INSTRUMENTO DE EVALUACIÓN-->


<!--MUESTRA EL TÍTULO DE LISTADOS DE INSTRUMENTOS DE EVALUACIÓN-->
<div class="col-sm-12">
    <h3 class="m-0 text-uppercase text-center title-principal">Listado instrumentos de Evaluación</h3>
    <br>
</div>
<!--FIN TÍTULO DE LISTADOS DE EVALUACIÓN-->

<!--SECCIÓN QUE PERMITE LISTAR LOS INSTRUMENTOS DE EVALUACIÓN-->
<div class="container-fluid title-principal">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <table id="tblInstrumentos" class="data-table table table-striped table-bordered title-principal">
                                <thead class="text-left text-uppercase">
                                    <tr role="row" style="background-color:#B2CDD3;">
                                        <th class="text-uppercase">Instrumentos</th>
                                        <th class="text-uppercase">Carrera</th>
                                        <th class="text-uppercase">plan</th>
                                        <th class="text-uppercase">porcentaje</th>
                                        <th class="text-center text-uppercase">opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($instrumentos as $instrumento) {

                                        $datos =
                                            $instrumento[0] . "||" .
                                            $instrumento[1] . "||" .
                                            $instrumento[2] . "||" .
                                            $instrumento[3] . "||" .
                                            $instrumento[4] . "||" .
                                            $instrumento[5] . "||" .
                                            $instrumento[6] . "||" .
                                            $instrumento[7] . "||" .
                                            $instrumento[8] . "||" .
                                            $instrumento[9] . "||" .
                                            $instrumento[10] . "||" .
                                            $instrumento[11] . "||" .
                                            $instrumento[12] . "||" .
                                            $instrumento[13] . "||" .
                                            $instrumento[14]
                                    ?>
                                        <tr role="row" class="text-left text-uppercase">
                                            <td><?php echo $instrumento['tins_nombre'] ?></td>
                                            <td><?php echo $instrumento['carr_codigo'] . " - " . $instrumento['carr_nombre'] ?></td>
                                            <td class="text-left"><?php echo $instrumento['plan_codigo'] ?></td>
                                            <td class="text-left"><?php echo $instrumento['tins_porcentaje'] ?>%</td>
                                            <td class="text-center">

                                                <a data-role="updateInstrumento" class="btn btn-warning" type="button" data-toggle="modal" aria-labelledby="mdlActualizarInstrumentoLabel" aria-hidden="true" onclick="agregaInstrumento('<?php echo $datos ?>');" data-target="#mdlActualizarInstrumento" id="<?php echo $instrumento['tins_codigo']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <?php
                                                echo '<a id="deleteInstrumento' . $instrumento["tins_codigo"] . '"type="button" class="deleteInstrumento btn btn-danger" data="' . $instrumento["tins_codigo"] . '">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                      </a>';
                                                ?>
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
<!--FIN LISTADO ÁREAS DE EVALUACIÓN-->

<!--MODAL - ARCHIVO MODAL PARA LA EDICIÓN DE INSTRUMENTOS DE EVALUACIÓN-->
<div class="modal fade" id="mdlActualizarInstrumento" tabindex="-1" aria-labelledby="mdlActualizarInstrumentoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-principal text-uppercase" id="titleActualizarInstrumento">Editar Instrumento de Evaluación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCerrarModalForm">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="frmActualizarInstrumento">
                    <div class="row">
                        <div class="col-sm-7 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">carrera</label>
                                <input id="carr_hidden" type="hidden" name="carr_hidden">
                                <input type="text" class="carreraUpdate form-control form-control-sm text-uppercase" id="carreraUpdate" name="carreraUpdate" readonly="true">
                            </div>
                        </div>

                        <div class="col-sm-3 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">plan carrera</label>
                                <input type="text" class="planCarreraUpdate form-control form-control-sm text-uppercase" id="planCarreraUpdate" name="planCarreraUpdate" readonly="true">
                            </div>
                        </div>

                        <div class="col-sm-2 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">Vigencia</label>
                                <select name="tinsVigenteUpdate" id="tinsVigenteUpdate" style="width:100%;" class="tinsVigenteUpdate form-control form-control-sm tinsVigente text-uppercase">
                                    <option value="S">SI</option>
                                    <option value="N">NO</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="dropdown-divider"></div>
                        </div>

                        <div class="col-sm-10 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase">nombre instrumento</label>
                                <input id="tins_hidden" type="hidden" name="tins_hidden">
                                <br>
                                <input type="text" class="tinsNombreUpdate form-control form-control-sm text-uppercase" id="instrumentoUpdate" name="instrumentoUpdate">
                            </div>
                        </div>

                        <div class="col-sm-2 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase">porcentaje</label>
                                <br>
                                <input type="text" class="tinsPorcentajeUpdate form-control form-control-sm text-uppercase" id="tinsPorcentajeUpdate" name="tinsPorcentajeUpdate" placeholder="ingrese porcentaje" onkeydown="cienUpdate();">
                            </div>
                        </div>

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">descripción</label>
                                <textarea name="tinsDescripcionUpdate" id="tinsDescripcionUpdate" placeholder="Ingrese Descripción" cols="10" rows="3" class="form-control tinsDescripcionUpdate text-uppercase title-principal">
                                </textarea>
                                <br>
                                <div id="contadorUpdate">
                                    <p class="title-principal error-msg-update" style="font-weight:bold; color:red; font-size:14px; float:left; display:none;">
                                        Total Caracteres Excedidos
                                    </p>
                                    <p style="text-align:right; font-weight:bold; font-size:14px;" id="contadorCaracteresUpdate" style="float:right;">0 / 250</p>
                                    <br clear="both">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center title-principal">
                        <button class="btn btn-success text-uppercase btnUpdate" id="btnUpdate" onclick="validaActualizacionInstrumento();" type="button">
                            <i class="fa fa-save"></i> actualizar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--FINAL MODAL-->