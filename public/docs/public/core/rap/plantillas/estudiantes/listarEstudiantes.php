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

$query -> bindParam(':rut_usu', $rut_usu);
$query -> execute();
$dato_sesion = $query->fetchAll(PDO::FETCH_ASSOC);

$nombre_usuario = $dato_sesion['nombre'];

foreach ($dato_sesion as $datos) :
     $nombre_usuario = $datos['nombre'];
endforeach;*/

?>

<!--Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="modal fade" id="mdlActualizarEstudiante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-uppercase title-principal" id="exampleModalLabel">REGISTRAR EVALUACIÓN ESTUDIANTES</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnLimpiarModal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--FORMULARIO DE ESTUDIANTES-->
                                <div class="container-fluid">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="" method="POST" id="formEstudiante">
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
                                                        <div class="col-sm-4 title-principal">
                                                            <div class="form-group">
                                                                <label class="text-uppercase">estado academico</label>
                                                                <input id="estuAcademico" type="text" class="form-control form-control-sm" readonly="true">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="dropdown-divider"></div>
                                                        </div>
                                                        <div class="col-sm-12 title-principal">
                                                            <div class="form-group">
                                                                <label class="text-uppercase">instrumento de evaluación(*)</label>
                                                                <select name="instrumento2" id="instrumento2" class="selectOption form-control form-control-sm instrumento2 select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="dropdown-divider"></div>
                                                            </div>
                                                            <div class="form-group table-responsive">
                                                                <table class="data-table table table-striped table-bordered title-principal tblAreasEstudiantes" name="tblAreasEstudiantes" id="tblAreasEstudiantes">

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group text-center title-principal">
                                                        <button id="btnSave" type="button" class="btnSave btn btn-success text-uppercase" onclick="validaFormLogro();">
                                                            <i class="fa fa-save"></i>
                                                            guardar
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--FIN FORMULARIO DE ESTUDIANTES-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Content Header-->
<br>
<div class="col-12">
    <h3 class="m-0 text-uppercase text-center title-principal">BÚSQUEDA DE ESTUDIANTES </h3>
</div>
<br>

<!--BUSCADOR-->
<div class="container-fluid">
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
                <button class="nav-link title-principal text-uppercase btn btn-link" id="nav-carrera-tab" data-toggle="tab" data-target="#nav-carrera" type="button" role="tab" aria-controls="nav-carrera" aria-selected="false">
                    Carrera
                </button>
                <button class="nav-link title-principal text-uppercase btn btn-link" id="nav-anho-tab" data-toggle="tab" data-target="#nav-anho" type="button" role="tab" aria-controls="nav-anho" aria-selected="false">
                    Año cohorte
                </button>
                <button class="nav-link title-principal text-uppercase btn btn-link" id="nav-condicion-tab" data-toggle="tab" data-target="#nav-condicion" type="button" role="tab" aria-controls="nav-condicion" aria-selected="false">
                    condición admisión
                </button>
            </div>
            <br>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nav-rut" role="tabpanel" aria-labelledby="nav-rut-tab">
                    <div class="container-fluid">
                        <form action="" method="POST" id="frmBusquedaRut">
                            <div class="row">
                                <div class="col-sm-12 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">RUT</label>
                                        <input type="hidden" value="1" id="rutBusqueda" name="busqueda">
                                        <input type="text" class="txtBuscaRut form-control form-control-sm text-uppercase" id="txtBuscaRut" name="txtBuscaRut" placeholder="Ingrese Rut, sin puntos, guión, DV">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group text-center title-principal">
                                        <button id="btnRut" type="submit" name="buscar" class="btnSave btn btn-success text-uppercase" onclick="validaFormBusquedaRut(this);">
                                            <i class="fa fa-save"></i>
                                            buscar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-carrera" role="tabpanel" aria-labelledby="nav-carrera-tab">
                    <div class="container-fluid">
                        <form action="" method="POST" id="frmBusquedaCarrera">
                            <div class="row">
                                <div class="col-sm-12 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">Carrera</label>
                                        <input type="hidden" value="2" id="carreraBusqueda" name="busqueda">
                                        <select name="selectCarrera" id="selectCarrera" class="selectCarrera selectOption form-control form-control-sm selectCarrera select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                            <?php
                                            //ARCHIVO QUE TRAE LAS CARRERAS REGISTRADAS
                                            include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/estudiantes/query/carrera.php";
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group text-center title-principal">
                                        <button class="btn btn-success text-uppercase btnCarrera" id="btnCarrera" type="submit" onclick="validaFormBusquedaCarrera();">
                                            <i class="fa fa-search"></i> Buscar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-anho" role="tabpanel" aria-labelledby="nav-anho-tab">
                    <div class="container-fluid">
                        <form action="" method="POST" id="frmBusquedaAnho">
                            <div class="row">
                                <div class="col-sm-12 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">AÑO COHORTE</label>
                                        <input type="hidden" value="3" id="anhoBusqueda" name="busqueda">
                                        <select name="anhoIngreso" id="anhoIngresoBuscar" class="anhoIngreso selectOption form-control form-control-sm selectAnho select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                            <?php
                                            //ARCHIVO QUE TRAE LAS AÑOS
                                            include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/estudiantes/query/anho_ingreso.php";
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group text-center title-principal">
                                        <button class="btn btn-success text-uppercase btnAnho" id="btnAnho" type="submit" onclick="validaFormBusquedaAnho();">
                                            <i class="fa fa-search"></i> Buscar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-condicion" role="tabpanel" aria-labelledby="nav-condicion-tab">
                    <div class="container-fluid">
                        <form action="" method="POST" id="frmBusquedaCondicion">
                            <div class="row">
                                <div class="col-sm-12 title-principal">
                                    <div class="form-group">
                                        <label class="text-uppercase">CONDICIÓN ADMISIÓN</label>
                                        <input type="hidden" value="4" id="condicionBusqueda" name="busqueda">
                                        <select name="condicion" id="condicion" class="condicion selectOption form-control form-control-sm selectCondicion select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                            <?php
                                            //ARCHIVO QUE TRAE LAS CARRERAS REGISTRADAS
                                            include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/estudiantes/query/condicion_admision.php";
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group text-center title-principal">
                                        <button class="btn btn-success text-uppercase btnCondicion" id="btnCondicion" type="submit" onclick="validaFormBusquedaCondicion();">
                                            <i class="fa fa-search"></i> Buscar
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
<!--FIN BUSCADOR-->

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
                            <table class="data-table table table-striped table-bordered table-responsive-xl title-principal resultadoEstudiantes text-uppercase" name="resultadoEstudiantes" id="resultadoEstudiantes">
                                <thead class="text-center text-uppercase">
                                    <tr role="row" style="background-color:#B2CDD3;">
                                        <th class=" text-uppercase">RUT</th>
                                        <th class=" text-uppercase">Nombre</th>
                                        <th class=" text-uppercase">Carrera</th>
                                        <th class=" text-uppercase">Plan Carrera</th>
                                        <th class=" text-uppercase">Año Ingreso</th>
                                        <th class=" text-uppercase">Condición Admisión</th>
                                        <th class=" text-uppercase">Evaluar</th>
                                    </tr>
                                </thead>

                                <tbody id="divresultadoEstudiantes" class="text-uppercase cuerpo">

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>