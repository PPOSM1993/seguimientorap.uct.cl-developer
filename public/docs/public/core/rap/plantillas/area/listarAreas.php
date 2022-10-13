<?php
/*---------------------------------------------------------------------------------------------------------------

    AUTOR: PEDRO PABLO OSORIO SAN MARTÍN
    FECHA CREACIÓN: 17-06-2022
    DESCRIPCIÓN: ARCHIVO PHP QUE LLAMA A LAS OPERACIONES CRUD LISTAR Y CREAR (PARA LOS INSTRUMENTOS DE EVALUACIÓN).
    
    ----------------------------------------------------------------------------------------------------------------*/
    
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";
//include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/lib/session.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/areas/select_area.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/areas/delete_area.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/areas/update_area.php";

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

<br>
<!--TÍTULO DE REGISTRO DE FORMULARIO DE ISNTRUMENTOS DE EVALUACIÓN-->
<div class="col-sm-12">
    <h3 class="m-0 text-uppercase text-center title-principal">registro de ÁREAS de evaluación</h3>
</div>
<br>
<!--FIN FORMULARIO TÍTULO INSTRUMENTOS DE EVALUACIÓN-->

<!--FORMULARIO QUE REGISTRA LAS ÁREAS DE EVALUACIÓN-->
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="frmAreas" name="frmAreas" action="" method="POST" class="frmAreas text-uppercase">
                    <div class="row">
                        <div class="col-sm-9 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">carrera</label>
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
                                <label class="text-uppercase">instrumento</label>
                                <select name="instrumento" id="instrumento" class="selectOption form-control form-control-sm instrumento select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                    <?php
                                    //ARCHIVO QUE TRAE A LOS INSTRUMENTOS DE EVALUACIÓN.
                                    include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/areas/query/instrumentos.php";
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase">nombre área de evaluación</label>
                                <br>
                                <input type="text" class="form-control form-control-sm text-uppercase areaEvaluacion" id="areaEvaluacion" name="areaEvaluacion" placeholder="ingrese área evaluación">
                            </div>
                        </div>

                        <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase" style="font-size:14px;">descripción</label>
                                <textarea name="rearNombreDescripcion" id="rearNombreDescripcion" placeholder="Ingrese Descripción" cols="10" rows="3" class="form-control rearNombreDescripcion text-uppercase title-principal"></textarea>
                                <br>
                                <div id="contador">
                                    <p class="title-principal error-msg-descripcion" style="font-weight:bold; color:red; font-size:14px; float:left; display:none;">
                                        Total Caracteres Excedidos
                                    </p>
                                    <p style="text-align:right; font-weight:bold; font-size:14px;" id="contadorCaracteres" style="float:right;">0 / 250</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group text-center title-principal">
                        <button id="btnSave" type="button" class="btnSave btn btn-success text-uppercase" onclick="validaFormArea();"><i class="fa fa-save"></i> guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--FIN ÁREAS DE EVALUACIÓN-->

<!--TÍTULO QUE MUESTRA LAS ÁREAS DE EVALUACIÓN-->
<div class="col-sm-12">
    <h3 class="m-0 text-uppercase text-center title-principal">Listado áreas de evaluación</h3>
    <br>
</div>
<!--FIN TÍTULO LISTADO ÁREAS DE EVALUACIÓN-->

<!---SECCIÓN QUE PERMITE LISTAR LAS ÁREAS DE EVALUACIÓN-->
<div class="container-fluid title-principal table">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="tblAreas" class="data-table table table-striped table-bordered title-principal">
                                <thead class="text-left text-uppercase">
                                    <tr role="row" style="background-color:#B2CDD3;">
                                        <th class="sorting text-uppercase">área evaluación</th>
                                        <th class="sorting text-uppercase">Instrumento</th>
                                        <th class="sorting text-uppercase">carrera</th>
                                        <th class="sorting text-uppercase">vigencia</th>
                                        <th class="sorting text-uppercase">opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($areas as $area) {
                                        $datos =
                                            $area[0] . "||" .
                                            $area[1] . "||" .
                                            $area[2] . "||" .
                                            $area[3] . "||" .
                                            $area[4] . "||" .
                                            $area[5] . "||" .
                                            $area[6] . "||" .
                                            $area[7] . "||" .
                                            $area[8]
                                    ?>
                                        <tr role="row" class="text-left text-uppercase">
                                            <td><?php echo $area["rear_nombre_area"] ?></td>
                                            <td><?php echo $area["tins_nombre"]; ?></td>
                                            <td><?php echo $area["carr_nombre"]; ?></td>
                                            <td><?php echo $area["rear_vigente"]; ?></td>
                                            <td class="text-center">
                                                <a href="#" data-role="mdlActualizarArea" class="btn btn-warning" type="button" data-toggle="modal" aria-labelledby="mdlActualizarAreaLabel" aria-hidden="true" onclick="agregaArea('<?php echo $datos ?>');" data-target="#mdlActualizarArea" id="<?php echo $area['rear_codigo']; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <?php
                                                echo '<a href="" id="deleteArea' . $area["rear_codigo"] . '"type="button" class="deleteArea btn btn-danger" data="' . $area["rear_codigo"] . '">
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
<!--FIN ÁREAS DE EVALUACIÓN-->

<!--MODAL QUE PERMITE CAPTURAR Y EDITAR LAS ÁREAS DE EVALUACIÓN-->
<div class="modal fade" id="mdlActualizarArea" tabindex="-1" aria-labelledby="mdlActualizarAreaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR ÁREA DE EVALUACIÓN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Formulario-->
                <div class="container-fluid">
                    <form action="" method="POST" id="frmActualizarInstrumento">
                        <div class="row">
                            <div class="col-sm-9 title-principal">
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

                            <div class="col-sm-12 title-principal">
                                <div class="form-group">
                                    <label for="" class="text-uppercase">instrumento</label>
                                    <br>
                                    <input id="tins_hidden" type="hidden" name="tins_hidden">
                                    <input type="text" class="instrumentoUpdate form-control form-control-sm text-uppercase" id="instrumentoUpdate" name="instrumentoUpdate">
                                </div>
                            </div>

                            <div class="col-sm-10 title-principal">
                                <div class="form-group">
                                    <label for="" class="text-uppercase">nombre área evaluación</label>
                                    <br>
                                    <input id="area_hidden" type="hidden" name="area_hidden">
                                    <input type="text" class="areaUpdate form-control form-control-sm text-uppercase" id="areaUpdate" name="areaUpdate">
                                </div>
                            </div>

                            <div class="col-sm-2 title-principal">
                                <div class="form-group">
                                    <label class="text-uppercase">Vigencia</label>
                                    <select name="areaVigenteUpdate" id="areaVigenteUpdate" style="width:100%;" class="areaVigenteUpdate form-control form-control-sm tinsVigente text-uppercase">
                                        <option value="S">SI</option>
                                        <option value="N">NO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="dropdown-divider"></div>
                            </div>

                            <div class="col-sm-12 title-principal">
                                <div class="form-group">
                                    <label for="" class="text-uppercase">descripción</label>
                                    <textarea name="areaDescripcionUpdate" id="areaDescripcionUpdate" placeholder="Ingrese Descripción" cols="10" rows="5" class="form-control areaDescripcionUpdate text-uppercase title-principal">
                                </textarea>
                                </div>
                                <div id="contadorUpdate">
                                    <p class="title-principal error-msg-descripcion-update" style="font-weight:bold; color:red; font-size:14px; float:left; display:none;">
                                        Total Caracteres Excedidos
                                    </p>
                                    <p style="text-align:right; font-weight:bold; font-size:14px;" id="contadorCaracteresUpdate" style="float:right;">0 / 250</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center title-principal">
                            <button class="btn btn-success text-uppercase btnUpdate" id="btnUpdate" onclick="validaActualizacionArea();" type="button">
                                <i class="fa fa-save"></i> actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!--Fin Formulario-->
        </div>
    </div>
</div>
</div>
<!--FINAL MODAL-->