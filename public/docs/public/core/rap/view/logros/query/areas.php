<?php
/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 13-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE POSEE LA CONSULTA PARA LISTAR LAS ÁREAS DE EVALUACIÓN..
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";


if (isset($_POST)) {
    //GENERAMOS LA CONSULTA

    $instrumento = $_POST['tins_codigo'];

    $area = "SELECT rear_codigo, rear_nombre_area
                FROM CELUCT.rap.registro_area_instrumento
                WHERE rear_codigo NOT IN (0) AND tins_codigo = :tins_codigo AND rear_vigente = 'S'";

    $query = $conexion->prepare($area);
    $query->bindParam(':tins_codigo', $instrumento);

    $query->execute();
    $dato_area = $query->fetchAll(PDO::FETCH_ASSOC);
}
