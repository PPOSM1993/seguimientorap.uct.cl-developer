<?php
    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 07-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LOS PLANES DE LAS CARRERAS REGISTRADAS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    $carrera = $_POST["carr_codigo"];
    

    //GENERAMOS LA CONSULTA
    $plan_carrera = "SELECT plan_codigo, plan_nombre
                FROM CELUCT.dbo.vista_strap_plan_carrera
                WHERE plan_codigo NOT IN(0, 77) AND carr_codigo = :carr_codigo";
    $query = $conexion -> prepare($plan_carrera);
    $query -> bindParam(':carr_codigo', $carrera);
    $query -> execute();
    $dato_plan_carrera = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_plan_carrera as $datos):
        echo '<option value="'.$datos["plan_codigo"].'">'.$datos["plan_codigo"]. " - "  .$datos["plan_nombre"].'</option>';
    endforeach;
?>