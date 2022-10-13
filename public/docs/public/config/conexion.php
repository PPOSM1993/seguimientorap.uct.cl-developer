<?php

    /*---------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 30-05-2022
        DESCRIPCIÓN   : ARCHIVO DE CONEXION
    ---------------------------------------------------------------------------------------------------------*/

    //LLAMADO AL ARCHIVO PRINCIPAL DE LAS CREDENCIALES
    include_once("credenciales.php");

    //ASIGNA LAS CREDENCIALES
    $mx_config = load_git_credencial("credenciales_strap.dat","STRAP");
    $servidor = $mx_config["host"];
    $usuario = $mx_config["user"];
    $pass = $mx_config["pass"];
    $database = $mx_config["database"];

    //echo var_dump($mx_config); //para comprobar la letura de los datos

    //conexión a la base de datos con "conexión" persistente
    try {
        $conexion = new PDO("sqlsrv:server=$servidor;database=$database",
        $usuario,
        $pass);

        //echo "conexión OK"; // para comprobar la conexión
        
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (Exception $e) {
            echo "Ocurrió un error " . $e -> getMessage();
    }
?>