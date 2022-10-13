<?php
/*---------------------------------------------------------------------------------------------------------------
        AUTOR         : PEDRO PABLO OSORIO SAN MARTÍN
        FECHA CREACIÓN: 13-07-2022
        DESCRIPCIÓN   : ARCHIVO PHP QUE POSEE LA CONSULTA PARA LISTAR LOS INSTRUMENTOS DE EVALUACIÓN..
    ----------------------------------------------------------------------------------------------------------------*/

//NECESITAMOS CONEXIÓN
include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/config/conexion.php";

//OPCIÓN POR DEFECTO
echo '<option value="">SELECCIONAR</option>';

if (isset($_POST)) {
    //GENERAMOS LA CONSULTA

    echo $_POST['carr_codigo'];
    $carrera = $_POST['carr_codigo'];
    
    echo $_POST['plan_codigo'];
    $plan_carrera = $_POST['plan_codigo'];

    $instrumento = "SELECT tins_codigo, tins_nombre 
                    FROM CELUCT.rap.tipo_instrumento
                    WHERE tins_codigo NOT IN (0) AND carr_codigo = :carr_codigo AND plan_codigo = :plan_codigo AND tins_vigente = 'S'";

    $query = $conexion->prepare($instrumento);

    $query -> bindParam(':carr_codigo', $carrera);
    $query -> bindParam(':plan_codigo', $plan_carrera);
    $query -> execute();
    $dato_instrumento = $query->fetchAll(PDO::FETCH_ASSOC);

    //GENERAMOS LAS <OPTION>
    foreach ($dato_instrumento as $datos) :
        echo '<option class="title-principal" value="' . $datos["tins_codigo"] . '">' . $datos["tins_codigo"] . " - "  . $datos["tins_nombre"] . '</option>';
    endforeach;
}
