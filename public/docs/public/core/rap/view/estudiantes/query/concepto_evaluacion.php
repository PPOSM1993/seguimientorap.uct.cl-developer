<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS  REGISTRADAS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    //GENERAMOS LA CONSULTA
    $concepto = "SELECT evcr_codigo, evcr_criterio, evcr_rango, evcr_descripcion, evcr_vigente 
                    FROM CELUCT.seg.evaluacion_criterio AS ec
                    WHERE tcri_codigo = 4 AND evcr_vigente = 'S'";

    $query = $conexion -> prepare($concepto);
    $query -> execute();
    $dato_concepto = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_concepto as $datos):
        echo '<option value="'.$datos["evcr_codigo"].'">'.$datos["evcr_rango"]. " - "  .$datos["evcr_criterio"].'</option>';
    endforeach;
?>


