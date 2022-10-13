<?php

    /*---------------------------------------------------------------------------------------------------------------

    AUTOR: PEDRO PABLO OSORIO SAN MARTÍN
    FECHA CREACIÓN: 08-06-2022
    DESCRIPCIÓN: ARCHIVO PHP QUE PERMITE GENERAR OPERACIÓN CRUD PARA LISTAR LOS INSTRUMENTOS DE EVALUACIÓN.

    ----------------------------------------------------------------------------------------------------------------*/

    include_once $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/core/rap/view/postulantes/postulantes.php";

?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right text-uppercase title-principal">
                    <li class="breadcrumb-item"><a>Postulantes </a></li>
                    <li class="breadcrumb-item"><a href="?menu=inicio">Inicio</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <br>
            <a href="?menu=registrarPostulante" class="btn btn-primary text-uppercase title" style="cursor: pointer;">
                <i class="fa fa-plus" aria-hidden="true"></i>
                crear postulante
            </a>
            <a onclick="" class="btn btn-info text-uppercase title" style="cursor: pointer;">
                <i class="fa fa-search" aria-hidden="true"></i>
                búsqueda avanzada
            </a>
            <br>
        <br>
        </div>
</div>
<!--End Content Header-->

<!--Título-->
    <div class="col-sm-12">
        <h3 class="m-0 text-uppercase text-center title-principal">Listado Postulantes</h3>
    </div><!-- /.col -->
<!--Fin Título-->


<section class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <br>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table id="tblPostulantes" class="data-table table table-striped table-bordered title-principal">
                                    <thead class="text-center text-uppercase">
                                        <tr role="row">
                                            <th class="sorting text-uppercase">rut</th>
                                            <th class="sorting text-uppercase">Nombre</th>
                                            <th class="sorting text-uppercase">Carrera</th>                        
                                            <th class="sorting text-uppercase">opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                        <?php foreach ($postulantes as $postulante) { ?>
                                            <tr role="row" class="text-center">
                                            <td><?php echo $postulante -> estd_rut . "-". $postulante -> estd_dv ?></td>
                                            <td><?php echo $postulante -> pos_nombre1 . " " . $postulante -> pos_nombre2 . " " . $postulante -> pos_apellido_paterno . " " . $postulante -> pos_apellido_materno ?></td>
                                                <td>Ingeniería Informática</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
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
</section>