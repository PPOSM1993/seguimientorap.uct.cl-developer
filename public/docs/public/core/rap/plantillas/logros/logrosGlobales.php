<?php

/*---------------------------------------------------------------------------------------------------------------

    AUTOR: PEDRO PABLO OSORIO SAN MARTÍN
    FECHA CREACIÓN: 17-06-2022
    DESCRIPCIÓN: ARCHIVO PHP QUE LLAMA A LAS OPERACIONES CRUD LISTAR Y CREAR (PARA LOS INSTRUMENTOS DE EVALUACIÓN).
    
    ----------------------------------------------------------------------------------------------------------------*/
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";

?>
<br>
<br>
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title title-principal text-uppercase" style="font-weight:bold;">Criterios de Búsqueda Estudiantes</div>
                <div class="card-tools">
                </div>
            </div>
            <div class="card-body">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
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

                <!--BÚSQUEDA POR CARRERA-->
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-carrera" role="tabpanel" aria-labelledby="nav-carrera-tab">
                        <div class="container-fluid">
                            <form action="" method="POST" id="frmBusquedaCarreraLogrosGlobales">
                                <div class="row">
                                    <div class="col-sm-12 title-principal">
                                        <div class="form-group">
                                            <label class="text-uppercase">Carrera</label>
                                            <input type="hidden" value="1" id="carreraBusquedaLogro" name="busqueda">
                                            <select name="selectCarreraLogroGlobal" id="selectCarreraLogroGlobal" class="selectCarreraLogroGlobal selectOption form-control form-control-sm selectCarreraLogroGlobal select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                                <?php
                                                //ARCHIVO QUE TRAE LAS CARRERAS REGISTRADAS
                                                include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/logros_globales/query/carrera.php";
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group text-center title-principal">
                                            <button class="btn btn-success text-uppercase btnCarrera" id="btnCarrera" type="submit" onclick="validaFormBusquedaCarreraLogro();">
                                                <i class="fa fa-search"></i> Buscar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--BÚSQUEDA POR AÑO COHORTE-->
                    <div class="tab-pane fade" id="nav-anho" role="tabpanel" aria-labelledby="nav-anho-tab">
                        <div class="container-fluid">
                            <form action="" method="POST" id="frmBusquedaAnhoLogroGlobales">
                                <div class="row">
                                    <div class="col-sm-12 title-principal">
                                        <div class="form-group">
                                            <label class="text-uppercase">AÑO COHORTE</label>
                                            <input type="hidden" value="2" id="anhoBusquedaLogro" name="busqueda">
                                            <select name="anhoIngresoBuscarLogroGlobal"  id="anhoIngresoBuscarLogroGlobal" class="anhoIngresoBuscarLogroGlobal selectOption form-control form-control-sm selectAnho select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                                <?php
                                                //ARCHIVO QUE TRAE LAS AÑOS
                                                include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/estudiantes/query/anho_ingreso.php";
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group text-center title-principal">
                                            <button class="btn btn-success text-uppercase btnAnho" id="btnAnho" type="submit" onclick="validaFormBusquedaAnhoLogro();">
                                                <i class="fa fa-search"></i> Buscar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--BÚSQUEDA POR CONDICIÓN ADMISIÓN-->
                    <div class="tab-pane fade" id="nav-condicion" role="tabpanel" aria-labelledby="nav-condicion-tab">
                        <div class="container-fluid">
                            <form action="" method="POST" id="frmBusquedaCondicionLogroGlobales">
                                <div class="row">
                                    <div class="col-sm-12 title-principal">
                                        <div class="form-group">
                                            <label class="text-uppercase">CONDICIÓN ADMISIÓN</label>
                                            <input type="hidden" value="3" id="condicionBusquedaLogro" name="busqueda">
                                            <select name="condicionLogroGlobales" id="condicionLogroGlobales" class="condicionLogroGlobales selectOption form-control form-control-sm selectCondicion select2-container select2 select2-primary text-uppercase" style="width:100%;">
                                                <?php
                                                //ARCHIVO QUE TRAE LAS CARRERAS REGISTRADAS
                                                include $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/logros_globales/query/condicion_admision.php";
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group text-center title-principal">
                                            <button class="btn btn-success text-uppercase btnCondicion" id="btnCondicion" onclick="validaFormBusquedaCondicionLogro();" type="submit">
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
</div>

<br>
<!--TÍTULO DE REGISTRO DE FORMULARIO DE ISNTRUMENTOS DE EVALUACIÓN-->
<div class="col-sm-12">
    <h3 class="m-0 text-uppercase text-center title-principal">Listado Logros Globales</h3>
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
                            <table id="tblLogrosGlobales" class="data-table table table-info table-striped table-bordered table-responsive-xl title-principal tblLogrosGlobales display">
                                <thead class="text-left text-uppercase">
                                    <tr role="row" style="background-color:#B2CDD3;" class="title-principal">
                                        <th class="sorting text-uppercase">RUT</th>
                                        <th class="sorting text-uppercase">NOMBRE</th>
                                        <th class="sorting text-uppercase">CARRERA</th>
                                        <th class="sorting text-uppercase">Año ingreso</th>
                                        <th class="sorting text-uppercase">condición admisión</th>
                                        <th class="sorting text-uppercase">instrumento evaluación</th>
                                    </tr>
                                </thead>
                                <tbody id="divresultadoLogros" class="text-uppercase cuerpo">

                                </tbody>

                            </table>
                            <div class="text-center">
                                <a class="btn btn-success" name="generar_reporte" onclick="" href="./docs/public/core/rap/view/logros_globales/excel_globales.php">
                                    GENERAR EXCEL
                                    <i class="fa fa-file-excel-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN LISTADO LOGRO ESTUDIANTES-->