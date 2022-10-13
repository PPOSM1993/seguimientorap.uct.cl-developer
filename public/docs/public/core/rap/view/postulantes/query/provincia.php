<?php


    /*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 06-06-2022
        DESCRIPCIÓN   : PHP TRAER TODAS LAS PROVINCIAS REGISTRADAS EN LA BASE DE DATOS.
    ----------------------------------------------------------------------------------------------------------------*/

    //LLAMAMOS AL ARCHIVO DE CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/config/conexion.php";

    //OPCIÓN POR DEFECTO
    echo '<option value="">SELECCIONAR</option>';

    if(isset($_POST)){
        echo $_POST["regi_codigo"];
        
        $region= $_POST["regi_codigo"];
    
        //GENERAMOS LA CONSULTA
        $provincia = "SELECT prov_codigo, prov_nombre
                        FROM CELUCT.dbo.vista_strap_provincias
                        WHERE prov_codigo NOT IN(0) AND regi_codigo = :regi_codigo";
        $query = $conexion -> prepare($provincia);
        $query -> bindParam(':regi_codigo', $region);
        $query -> execute();
        $dato_provincia = $query -> fetchAll(PDO::FETCH_ASSOC);

        //GENERAMOS LAS <OPTION>
        foreach($dato_provincia as $datos):
            echo '<option value="'.$datos["prov_codigo"].'">'.$datos["prov_nombre"].'</option>';
        endforeach;
    }
?>