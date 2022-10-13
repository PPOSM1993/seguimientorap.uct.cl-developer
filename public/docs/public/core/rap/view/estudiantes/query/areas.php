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

    //GENERAMOS <TABLE>
    echo '<thead class="text-uppercase text-center">
                <tr role="row" style="background-color:#B2CDD3;">
                    <th class="sorting text-uppercase">áreas</th>
                    <th class="sorting text-uppercase">Logro Obtenido</th>
                    <th class="sorting text-uppercase">evaluados</th>
                </tr>
           </thead>';
    foreach ($dato_area as $iInd => $datos) :
        echo '
        <tbody class="text-uppercase cuerpo">
            <tr role="row">
                    <td style="display:none" id="areaEvaluacionId' . $iInd . '">' . $datos["rear_codigo"] . '</td>
                    <td id="areaEvaluacion' . $iInd . '" value="' . $datos["rear_codigo"] . '">' . $datos["rear_nombre_area"] . '</td>
                <td>
                    <input class="form-control form-control-sm logroArea" 
                           id="logroArea' . $iInd . '" 
                           type="number" 
                           name="logroArea" 
                           onkeyup="sumarLogro();" 
                           disabled="disabled"
                           >
                </td>

                <td class="text-center text-uppercase" id="">
                <input type="checkbox" id="habilitarLogro' . $iInd . '" name="habilitarLogro" class="habilitarLogro" onclick="EnableDisabledtextbox(this,' . $iInd . ');">
                </td>
            </tr>
        </tbody>';

    endforeach;
    echo '<tfoot class="title-principal">
            <tr role="row">
                <td class=" text-uppercase">Logro General</td>
                <td class="text-center" id="">
                    <p class="text-center logroObtenido" id="logroObtenido"></p>
                </td>
                <td class="text-center text-uppercase" id="conceptoId' . $iInd . '">
                    <select name="conceptoEvaluacion" id="conceptoEvaluacion" disabled="disabled" style="width:100%;" class="conceptoEvaluacion selectOption form-control form-control-sm conceptoEvaluacion select2-container select2 select2-primary text-uppercase">';
                        include_once $_SERVER["DOCUMENT_ROOT"] . "/docs/public/core/rap/view/estudiantes/query/concepto_evaluacion.php";
                    '</select>
                </td>
                </tr>
                
          </tfoot>';
} 
