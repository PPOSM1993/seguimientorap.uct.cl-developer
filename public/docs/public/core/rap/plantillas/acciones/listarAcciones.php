<?php
/*---------------------------------------------------------------------------------------------------------------

    AUTOR: PEDRO PABLO OSORIO SAN MARTÍN
    FECHA CREACIÓN: 08-06-2022
    DESCRIPCIÓN: ARCHIVO PHP QUE LLAMA AL PROCEDIMIENTO ALMACENADO).
    
    ----------------------------------------------------------------------------------------------------------------*/

//LLAMAMOS A LA CONEXIÓN


include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";
/*include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/lib/session.php";

session_start();

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

include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/acciones/select_accion.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/acciones/insert_accion.php";

?>


<!--TÍTULO DE REGISTRO DE FORMULARIO DE  ACCIONES DE NIVELACIÓN-->
<div class="col-sm-12">
    <br>
    <h3 class="m-0 text-uppercase text-center title-principal">acciones de nivelación</h3>
</div>
<br>
<!--FIN TÍTULO TÍTULO DE ACCIONES DE NIVELACIÓN-->


<!--INCIO DE FORMULARIO DE INSTRUMENTO DE EVALUACIÓN-->
<div class="container-fluid title-principal">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <form id="frmAcciones" name="frmAcciones" action="" method="POST" class="frmAcciones text-uppercase">
                    <div class="row">

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase" style="font-size:14px;">carrera</label>
                                <select class="carreraAccion selectOption form-control form-control-sm selectCarrera select2-container select2 select2-primary text-uppercase" name="carreraAccion" id="carreraAccion" style="width:100%;" value="">
                                    <?php
                                    //ARCHIVO QUE TRAE LAS CARRERAS REGISTRADAS
                                    include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/acciones/query/carrera.php";
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="dropdown-divider"></div>
                        </div>

                        <div class="col-sm-9 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">instrumento</label>
                                <select name="instrumento" id="instrumento" style="width:100%;" class="instrumento selectOption form-control form-control-sm planCarrera select2-container select2 select2-primary text-uppercase">
                                    <?php
                                    //ARCHIVO QUE TRAE LOS PLANES DE CARRERAS REGISTRADOS
                                    include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/acciones/query/instrumentos.php";
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 title-principal">
                            <div class="form-group">
                                <label style="font-size:14px;">Año cohorte</label>
                                <select name="anivAnhoCohorte" id="anivAnhoCohorte" style="width:100%;" class="anivAnhoCohorte selectOption form-control form-control-sm planCarrera select2-container select2 select2-primary text-uppercase">
                                    <?php
                                    //ARCHIVO QUE TRAE LOS PLANES DE CARRERAS REGISTRADOS
                                    include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/acciones/query/anho_cohorte.php";
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">descripción</label>
                                <textarea name="anivDescripcion" id="anivDescripcion" placeholder="Ingrese Descripción" cols="10" rows="3" class="form-control anivDescripcion text-uppercase title-principal"></textarea>
                                <br>
                                <div id="contador">
                                    <p class="title-principal error-msg" style="font-weight:bold; color:red; font-size:14px; float:left; display:none;">
                                        Total Caracteres Excedidos
                                    </p>
                                    <p style="text-align:right; font-weight:bold; font-size:14px;" id="contadorDescripcion" style="float:right;">0 / 250</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">observacion</label>
                                <textarea name="anivObservacion" id="anivObservacion" placeholder="Ingrese observación" cols="10" rows="3" class="form-control anivObservacion text-uppercase title-principal"></textarea>
                                <br>
                                <div id="contador">
                                    <p class="title-principal error-msg-observacion" style="font-weight:bold; color:red; font-size:14px; float:left; display:none;">
                                        Total Caracteres Excedidos
                                    </p>
                                    <p style="text-align:right; font-weight:bold; font-size:14px;" id="contadorObservacion" style="float:right;">0 / 250</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center title-principal">
                        <button id="btnSave" type="button" class="btnSave btn btn-success text-uppercase" onclick="validaFormAcciones();"><i class="fa fa-save"></i> guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--FIN FORMULARIO DE INSTRUMENTO DE EVALUACIÓN-->


<!--SECCIÓN QUE PERMITE LISTAR LOS INSTRUMENTOS DE EVALUACIÓN-->
<div class="container-fluid title-principal">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <table id="tblAcciones" class="data-table table table-striped table-bordered title-principal">
                                <thead class="text-center text-uppercase">
                                    <tr role="row" style="background-color:#B2CDD3;">
                                        <th class=" text-uppercase">Instrumentos</th>
                                        <th class=" text-uppercase">descripción</th>
                                        <th class=" text-uppercase">observación</th>
                                        <th class=" text-uppercase">opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($acciones as $accion) {
                                        $datos =
                                            $accion[0] . "||" .
                                            $accion[1] . "||" .
                                            $accion[2] . "||" .
                                            $accion[3] . "||" .
                                            $accion[4] . "||" .
                                            $accion[5] . "||" .
                                            $accion[6] . "||" .
                                            $accion[7] . "||" .
                                            $accion[8] . "||" .
                                            $accion[9] . "||" .
                                            $accion[10]
                                    ?>
                                        <tr role="row" class="text-left text-uppercase">
                                            <td><?php echo $accion['tins_nombre'] ?></td>
                                            <td><?php echo $accion['aniv_descripcion'] ?></td>
                                            <td><?php echo $accion['aniv_observacion'] ?></td>
                                            <td class="text-center">

                                                <a data-role="updateAccionNivelacion" class="btn btn-warning" type="button" data-toggle="modal" aria-labelledby="mdlActualizarNivelacionLabel" aria-hidden="true" onclick="agregaNivelacion('<?php echo $datos ?>');" data-target="#mdlActualizarNivelacion" id="<?php echo $accion['aniv_codigo']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <?php
                                                echo '<a id="deleteAccion' . $accion["aniv_codigo"] . '"type="button" class="deleteAccion btn btn-danger" data="' . $accion["aniv_codigo"] . '">
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

<!--MODAL - ARCHIVO MODAL PARA LA EDICIÓN DE INSTRUMENTOS DE EVALUACIÓN-->
<div class="modal fade" id="mdlActualizarNivelacion" tabindex="-1" aria-labelledby="mdlActualizarNivelacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-principal text-uppercase" id="titleActualizarInstrumento">Editar Instrumento de Evaluación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCerrarModalForm">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="frmActualizarAccion">
                    <div class="row">
                        <div class="col-sm-1 title-principal">
                            <input id="accion_hidden" name="accion_hidden" type="hidden">
                        </div>
                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">carrera</label>
                                <input id="carr_hidden" type="hidden" name="carr_hidden">
                                <input type="text" class="carreraAccionUpdate form-control form-control-sm text-uppercase" id="carreraAccionUpdate" name="carreraAccionUpdate" readonly="true">
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
                                <input type="text" class="tinsNombreUpdate form-control form-control-sm text-uppercase" id="tinsNombreUpdate" name="tinsNombreUpdate" readonly="true">
                            </div>
                        </div>

                        <div class="col-sm-2 title-principal text-uppercase">
                            <div class="form-group">
                                <label style="font-size:14px;">Año cohorte</label>
                                <input type="text" class="anivAnhoCohorteUpdate form-control form-control-sm text-uppercase" id="anivAnhoCohorteUpdate" name="anivAnhoCohorteUpdate" readonly="true">
                            </div>
                        </div>
                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">descripción</label>
                                <textarea name="anivDescripcionUpdate" id="anivDescripcionUpdate" placeholder="Ingrese Descripción" cols="10" rows="3" class="form-control anivDescripcionUpdate text-uppercase title-principal"></textarea>
                                <br>
                                <div id="contadorDescripcionUpdate">
                                    <p class="title-principal error-msg-descripcion-update" style="font-weight:bold; color:red; font-size:14px; float:left; display:none;">
                                        Total Caracteres Excedidos
                                    </p>
                                    <p style="text-align:right; font-weight:bold; font-size:14px;" id="contadorDescripcion" style="float:right;">0 / 250</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">observacion</label>
                                <textarea name="anivObservacionUpdate" id="anivObservacionUpdate" placeholder="Ingrese observación" cols="10" rows="3" class="form-control anivObservacionUpdate text-uppercase title-principal"></textarea>
                                <br>
                                <div id="contadorObservacionUpdate">
                                    <p class="title-principal error-msg-observacion-update" style="font-weight:bold; color:red; font-size:14px; float:left; display:none;">
                                        Total Caracteres Excedidos
                                    </p>
                                    <p style="text-align:right; font-weight:bold; font-size:14px;" id="contadorObservacion" style="float:right;">0 / 250</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center title-principal">
                        <button class="btn btn-success text-uppercase btnUpdate" id="btnUpdate" onclick="validaActualizacionNivelacion();" type="button">
                            <i class="fa fa-save"></i> actualizar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--FINAL MODAL-->