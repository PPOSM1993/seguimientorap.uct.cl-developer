<?php


    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS PROVINCIAS REGISTRADAS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    
    //GENERAMOS LA CONSULTA
    $provincia = "SELECT prov_codigo, prov_nombre
                    FROM strap.dbo.vista_strap_provincias
                    WHERE regi_codigo NOT IN(0)";
    $query = $conexion -> prepare($provincia);
    $query -> execute();
    $dato_nacion = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_nacion as $datos):
        echo '<option value="'.$datos["prov_codigo"].'">'.$datos["prov_nombre"].'</option>';
    endforeach;

?>

?>