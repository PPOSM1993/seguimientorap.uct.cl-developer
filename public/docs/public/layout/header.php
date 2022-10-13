<?php


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

$query -> bindParam(':rut_usu', $rut_usu);
$query -> execute();
$dato_sesion = $query->fetchAll(PDO::FETCH_ASSOC);

$nombre_usuario = $dato_sesion['nombre'];

foreach ($dato_sesion as $datos) :
     $nombre_usuario = $datos['nombre'];
endforeach;*/
?>

<!--Inicio Header -->
<nav class="main-header navbar navbar-expand navbar-primary navbar-light">
    <!-- Left header links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars icon-header"></i></a>
        </li>
    </ul>
    <!-- Right header links -->
    <ul class="navbar-nav ml-auto">
        <!-- User profile Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <p class="title-principal text-uppercase" style="color:black" ;>Usuario: <? echo  $nombre_usuario; ?></p>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"></span>
                <div class="dropdown-divider"></div>
                <a href="?menu=perfildeUsuario" class="dropdown-item nav-link text-uppercase title-principal" style="cursor: pointer;">
                    <i class="fa fa-user mr-2"></i> Perfil
                    <span class="float-right text-muted text-sm"></span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="?log=inicio_sesion.php" class="dropdown-item nav-link text-uppercase title-principal" style="cursor: pointer;">
                    <i class="fa fa-sign-out mr-2"></i> Cerrar Sesión
                    <span class="float-right text-muted text-sm"></span>
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer"></a>
            </div>
        </li>
    </ul>
</nav>
<!--Fin Header-->