<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE TRAE LA INFORMACIÓN REGISTRADA
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/config/conexion.php";
    //include_once "../../../../../config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    //GENERAMOS LA CONSULTA
    $sexo = "SELECT sexo_codigo, sexo_nombre
                    FROM CELUCT.dbo.vista_strap_sexo
                    WHERE sexo_codigo NOT IN(0)";
    $query = $conexion -> prepare($sexo);
    $query -> execute();
    $dato_sexo = $query -> fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach($dato_sexo as $datos):
        echo '<option value="'.$datos["sexo_codigo"].'">'.$datos["sexo_nombre"].'</option>';
    endforeach;

?>