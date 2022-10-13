<!--Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right text-uppercase title-principal">
                    <li class="breadcrumb-item"><a>Registro Postulantes </a></li>
                    <li class="breadcrumb-item"><a href="?menu=inicio">Inicio</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div>
</div>
<!--End Content Header-->
<!--Título-->
    <div class="col-sm-12">
        <h3 class="m-0 text-uppercase text-center title-principal">registro de Postulantes</h3>
        <div class="dropdown-divider"></div>
    </div><!-- /.col -->
<!--Fin Título-->

<!--Formulario-->
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="background-color:#b7cff2;">
                <form id="frmPostulante" name="frmPostulante" action="listarPostulantes.php" method="POST" class="frmPostulante text-uppercase">
                    <div class="row">
                    <div class="col-sm-12 title-principal">
                            <div class="form-group">
                                <label class="text-uppercase">carrera(*)</label>
                                <select name="carrera" id="carrera" class="selectOption form-control form-control-sm selectCarrera select2-container select2 select2-primary text-uppercase"
                                 style="width:100%;">
                                    <?php 
                                        include $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/core/rap/view/postulantes/query/carrera.php";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 title-principal">
                            <div class="form-group">
                                <label>vía ingreso(*)</label>
                                <select name="viaIngreso" id="viaIngreso" class="selectOption form-control form-control-sm selectVia select2-container select2 select2-primary text-uppercase" 
                                style="width:100%;">
                                    <?php 
                                        include $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/core/rap/view/postulantes/query/via_ingreso.php";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 title-principal">
                            <div class="form-group">
                                <label>condición admisión(*)</label>
                                <select name="selectCondicion" id="selectCondicion"  style="width:100%;"
                                class="selectOption form-control form-control-sm selectVia select2-container select2 select2-primary text-uppercase" 
                                multiple="multiple">
                                    <?php 
                                        include $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/core/rap/view/postulantes/query/condicion_admision.php";
                                    ?>    
                            </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-sm-4 title-principal">
                            <div class="form-group">
                                <label for="" class="text-uppercase">rut(*)</label>
                                <br>
                                    <input type="text" class="form-control form-control-sm text-uppercase" id="rut" name="rut" placeholder="ingrese rut" style="float:left;  width:86%;" minlength="8" maxlength="10">
                                    <input type="text" class="form-control form-control-sm text-uppercase text-center" id="dv" name="dv" placeholder="dv" style="float:right; width:12%;" minlength="1" maxlength="1">
                            </div>
                        </div>

                        <div class="col-sm-4 title-principal">
                            <div class="form-group">
                                <label>Número Pasaporte(*)</label>
                                <input type="text" id="numPasaporte" name="numPasaporte" class="form-control form-control-sm text-uppercase" 
                                id="numPasaporte" placeholder="ingrese número de pasaporte">
                            </div>
                        </div>
                        <div class="col-sm-4 title-principal">
                            <div class="form-group">
                                <label>nacionalidad(*)</label>
                                <select class="selectOption form-control form-control-sm" name="nacionalidad" id="nacionalidad" style="width:100%;">
                                    <?php 
                                        include $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/core/rap/view/postulantes/query/nacionalidad.php";
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 title-principal">

                            <div class="form-group">
                                <label>primer Nombre(*)</label>
                                <input type="text" id="primerNombre" name="primerNombre" class="form-control form-control-sm text-uppercase"  placeholder="ingrese primer nombre postulante" value="">
                            </div>
                            <div class="form-group">
                                <label>apellido paterno(*)</label>
                                <input type="text" class="form-control form-control-sm text-uppercase" id="apPaterno" name="apPaterno" placeholder="ingrese apellido paterno postulante" value="">
                            </div>
                            <div class="form-group">
                                <label>nombre social</label>
                                <input type="text" class="form-control form-control-sm text-uppercase" id="segundoNombre" name="segundoNombre" placeholder="ingrese nombre social" value="">
                            </div>
                        </div>
                        <div class="col-sm-6 title-principal">
                            <div class="form-group">
                                <label>segundo nombre</label>
                                <input type="text" class="form-control form-control-sm text-uppercase" id="segundoNombre" name="segundoNombre" placeholder="ingrese segundo nombre postulante">
                            </div>
                            <div class="form-group">
                                <label>apellido materno</label>
                                <input type="text" class="form-control form-control-sm text-uppercase" id="apMaterno" name="apPaterno" placeholder="ingrese apellido materno postulante">
                            </div>   
                            <div class="form-group">
                                <label>sexo(*)</label>
                                <br>
                                <select class="selectOption form-control form-control-sm" name="sexo" id="sexo" style="width:100%;">
                                    <?php 
                                        include $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/core/rap/view/postulantes/query/sexo.php";
                                    ?>
                                </select>
                            </div>



                        </div>
                        <div class="col-sm-4 title-principal">
                            <div class="form-group">
                                <label>Fecha nacimiento(*)</label>
                                <input type="text" class="date form-control form-control-sm text-uppercase" id="fechaNacimiento" name="fechaNacimiento" placeholder="DD/MM/YYYY" readonly
                                value="">
                            </div>
                        </div>

                        <div class="col-sm-4 title-principal">
                            <div class="form-group">
                                    <label for="" class="text-uppercase">correo personal(*)</label>
                                    <input type="text" class="form-control form-control-sm text-uppercase" id="correo" name="correo" placeholder="algo@algo.cl">
                            </div>
                        </div>
                        
                        <div class="col-sm-4 title-principal">
                            <div class="form-group">
                                <label>télefono personal(*)</label>
                                <input type="text" class="form-control form-control-sm text-uppercase" id="telefonoPersonal" name="telefonoPersonal" placeholder="+56912345678">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="dropdown-divider"></div>
                        </div>
                        <div class="col-sm-6 title-principal">
                            <div class="form-group">
                                <label>Dirección Personal(*)</label>
                                <input type="text" class="form-control form-control-sm text-uppercase" id="direccionPersonal" name="direccionPersonal" placeholder="ingrese dirección personal">
                            </div>
                            <div class="form-group">
                                <label>provincia(*)</label>
                                <select name="provincia" id="provincia" class="selectOption form-control form-control-sm selectProvincia select2 select2-container select2-primary text-uppercase"
                                style="width:100%;">
                                    <?php 
                                        include $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/core/rap/view/postulantes/query/provincia.php";
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 title-principal">
                            <div class="form-group">
                                <label>región(*)</label>
                                <select name="region" id="region" class="selectOption form-control form-control-sm selectRegion select2-container select2 select2-primary text-uppercase"
                                style="width:100%;">
                                    <?php 
                                        include $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/core/rap/view/postulantes/query/region.php";
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>comuna(*)</label>
                                <select name="comuna" id="comuna" class="selectOption form-control form-control-sm selectComuna select2 select2-container select2-primary text-uppercase"
                                style="width:100%;">
                                    <?php 
                                        include $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/core/rap/view/postulantes/query/comuna.php";
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group text-center title-principal">
                        <button id="btnSave" type="button" onclick="validaFormPostulante();" class="btnSave btn btn-success text-uppercase"><i class="fa fa-save"></i> Registrar Postulante</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Fin Formulario-->