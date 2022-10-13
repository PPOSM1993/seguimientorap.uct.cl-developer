<?php
    /*---------------------------------------------------------------------------------------------------------------
    AUTOR: PEDRO PABLO OSORIO SAN MARTÍN
    FECHA CREACIÓN: 07-06-2022
    DESCRIPCIÓN: ARCHIVO PHP QUE PERMITE GENERAR OPERACIÓN CRUD PARA LISTAR LOS POSTULANTES.
    ----------------------------------------------------------------------------------------------------------------*/

    //session_start();

    //NECESITAMOS CONEXIÓN
    include_once $_SERVER["DOCUMENT_ROOT"]."/modulo_uct_rap/docs/public/config/conexion.php";

    $sentencia = $conexion->query("SELECT pos_codigo_postulacion, estd_rut, estd_dv, cond_codigo_condicion, epos_codigo_estado, pos_nombre1, pos_nombre2,
                                    pos_apellido_paterno, pos_apellido_materno, pos_nombre_social, pos_fecha_nacimiento, pos_genero, pos_correo_personal, pos_telefono_personal,
                                    pos_codigo_nacionalidad, usuario_mod, fecha_mod FROM rap.postulacion");
    $postulantes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>