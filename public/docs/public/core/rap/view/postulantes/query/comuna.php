<?php

    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 07-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS CARRERAS REGISTRADAS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    if(isset($_POST)){
        
        echo $_POST["regi_codigo"];
        $region= $_POST["regi_codigo"];

        echo $_POST["prov_codigo"];
        $provincia= $_POST["prov_codigo"];
    
        //GENERAMOS LA CONSULTA
        $comuna = "SELECT comu_codigo, comu_nombre
                        FROM CELUCT.dbo.vista_strap_comunas
                        WHERE comu_codigo NOT IN(0) AND regi_codigo = :regi_codigo AND prov_codigo = :prov_codigo";
        $query = $conexion -> prepare($comuna);
        $query -> bindParam(':regi_codigo', $region);
        $query -> bindParam(':prov_codigo', $provincia);
        $query -> execute();
        $dato_comuna = $query -> fetchAll(PDO::FETCH_ASSOC);

        //GENERAMOS LAS <OPTION>
        foreach($dato_comuna as $datos):
            echo '<option value="'.$datos["comu_codigo"].'">'.$datos["comu_nombre"].'</option>';
        endforeach;

    }

?>