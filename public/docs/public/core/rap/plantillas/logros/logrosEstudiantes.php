<?php
/*---------------------------------------------------------------------------------------------------------------
    AUTOR: PEDRO PABLO OSORIO SAN MARTÍN
    FECHA CREACIÓN: 16-08-2022
    DESCRIPCIÓN: ARCHIVO PHP QUE LLAMA A LAS OPERACIONES CRUD LISTAR Y CREAR (LOS RESULTADOS Y LOGROS DE LOS ESTUDIANTES).
    ----------------------------------------------------------------------------------------------------------------*/

include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/lib/session.php";
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
<br>
<div class="container-fluid">
    <!--FILTRADOR QUE PERMITE BUSCAR ESTUDIANTES DE DIVERSAS FORMAS-->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title title-principal text-uppercase" style="font-weight:bold;">Criterios de Búsqueda Estudiantes</div>
                <div class="card-tools">
                </div>
            </div>
            <div class="card-body">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link title-principal text-uppercase btn btn-link" id="nav-rut-tab" data-toggle="tab" data-target="#nav-rut" type="button" role="tab" aria-controls="nav-rut" aria-selected="false">
                        RUT
                    </button>
                </div>
                <br>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-rut" role="tabpanel" aria-labelledby="nav-rut-tab">
                        <div class="container-fluid">
                            <form action="" method="POST" id="frmBusquedaRutLogro">
                                <div class="row">
                                    <div class="col-sm-12 title-principal">
                                        <div class="form-group">
                                            <label class="text-uppercase">RUT</label>
                                            <input type="hidden" value="1" id="rutBusquedaLogro" name="busquedaLogro">
                                            <input type="text" class="txtBuscaRutLogro form-control form-control-sm text-uppercase" id="txtBuscaRutLogro" name="txtBuscaRutLogro" placeholder="Ingrese Rut, sin puntos, guión, DV">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group text-center title-principal">
                                            <button id="btnRut" type="submit" name="buscar" class="btnSave btn btn-success text-uppercase" onclick="validaFormBusquedaRutLogro();">
                                                <i class="fa fa-save"></i>
                                                buscar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FINAL FILTRADOR BUSCADOR-->
    <br>
    <!--TÍTULO DE REGISTRO DE FORMULARIO DE ISNTRUMENTOS DE EVALUACIÓN-->
    <div class="col-sm-12">
        <h3 class="m-0 text-uppercase text-center title-principal">Listado Logros Estudiantes</h3>
    </div>

    <br>
    <div class="col-12">
        <div class="dropdown-divider"></div>
    </div>
    <br>

    <!---SECCIÓN QUE PERMITE LISTAR LOS LOGROS DE CADA ESTUDIANTE-->
    <div class="container-fluid title-principal">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row title-principal">
                            <div class="col-lg-12 title-principal content">
                                <table id="tblLogrosEstudiantes" class="data-table table table-info table-striped table-bordered table-responsive-xl title-principal tblLogrosEstudiantes display">
                                    <thead class="text-left text-uppercase">
                                        <tr role="row" style="background-color:#B2CDD3;" class="title-principal">
                                            <th class="sorting text-uppercase">RUT</th>
                                            <th class="sorting text-uppercase">NOMBRE</th>
                                            <th class="sorting text-uppercase">REGISTRO</th>
                                            <th class="sorting text-uppercase">CARRERA</th>
                                            <th class="sorting text-uppercase">PLAN CARRERA</th>
                                            <th class="sorting text-uppercase">INSTRUMENTO</th>
                                            <th class="sorting text-uppercase">OPCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody id="divresultadoLogros" class="text-uppercase cuerpo">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FIN LOGROS ESTUDIANTES-->

    <!--MODAL QUE PERMITE PRESENTAR LA INFORMACIÓN DEL ESTUDIANTE Y LAS EVALUACIONES RENDIDAS POR ESTE-->
    <div class="modal fade" id="mdlListarLogros" tabindex="-1" aria-labelledby="mdlListarLogrosLabel" aria-hidden="true" style="max-height: 900% !important;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnLimpiarModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--FORMULARIO DE ESTUDIANTES-->
                    <div class="container title-principal">
                        <form action="" method="POST" id="frmLogrosEstudiantes">
                            <div class="row">
                                <div class="col-sm-12 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">carrera</label>
                                        <input type="text" id="carrera" class="form-control carrera form-control-sm" readonly="true" name="carrera">
                                        <input type="hidden" id="cod_carrera" class="form-control carrera form-control-sm" readonly="true" name="cod_carrera">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dropdown-divider"></div>
                                </div>
                                <div class="col-sm-3 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">RUT</label>
                                        <input type="text" id="rut" class="form-control form-control-sm" readonly="true">
                                    </div>
                                </div>
                                <div class="col-sm-9 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">Estudiante</label>
                                        <input type="text" id="nombre" class="form-control form-control-sm" readonly="true">
                                    </div>
                                </div>
                                <div class="col-sm-6 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">condición admisión</label>
                                        <input type="text" id="condicionAdmision" class="form-control form-control-sm" readonly="true">
                                    </div>
                                </div>

                                <div class="col-sm-6 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">estado academico</label>
                                        <input id="estuAcademico" type="text" class="form-control form-control-sm" readonly="true">
                                    </div>
                                </div>
                                <div class="col-sm-4 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">Registro</label>
                                        <input type="text" id="estuRegistro" class="form-control form-control-sm" readonly="true">
                                    </div>
                                </div>

                                <div class="col-sm-4 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">Año Ingreso</label>
                                        <input type="text" id="anhoIngreso" class="form-control form-control-sm" readonly="true">
                                    </div>
                                </div>
                                <div class="col-sm-4 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">Semestre Ingreso</label>
                                        <input type="text" id="semestreIngreso" class="form-control form-control-sm" readonly="true">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dropdown-divider"></div>
                                </div>
                                <div class="col-sm-12 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">Instrumento Evaluación</label>
                                        <input type="text" id="instrumento" class="form-control form-control-sm" readonly="true">
                                    </div>
                                </div>
                                <div class="col-sm-6 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">Año Evaluación</label>
                                        <input type="text" id="anhoEvaluacion" class="form-control form-control-sm" readonly="true">
                                    </div>
                                </div>
                                <div class="col-sm-6 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">Semestre Evaluación</label>
                                        <input type="text" id="semestreEvaluacion" class="form-control form-control-sm" readonly="true">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="dropdown-divider"></div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group table-responsive">
                                    <table class="data-table table table-striped table-bordered table-info title-principal tblInfoLogros" name="tblInfoLogros" id="tblInfoLogros">
                                        <thead class="text-uppercase text-center">
                                            <tr role="row" style="background-color:#B2CDD3;" class="text-left">
                                                <th class="sorting text-uppercase">áreas</th>
                                                <th class="sorting text-uppercase">Logro Obtenido</th>
                                                <th class="sorting text-uppercase">Concepto</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-uppercase text-center cuerpo">
                                            <tr role="row">
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--FIN FORMULARIO DE ESTUDIANTES-->
                </div>
            </div>
        </div>
    </div>
    <!--FIN MODAL ESTUDIANTE-->

    <!--
    <div class="card">
        <div class="card-body"></div>
    </div>-->