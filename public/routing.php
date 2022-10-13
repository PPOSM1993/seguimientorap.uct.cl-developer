<?php

if(isset($_GET['menu'])) {

        if ($_GET['menu']=='inicio') {
            require_once('docs/public/core/rap/plantillas/home/base.php');
        }
        
        #Listados
        if ($_GET['menu']=='listarEstudiantes') {
            require_once('docs/public/core/rap/plantillas/estudiantes/listarEstudiantes.php');
        }
        if ($_GET['menu']=='listarInstrumentos') {
            require_once('docs/public/core/rap/plantillas/instrumentos/listarInstrumentos.php');
        }
        if ($_GET['menu']=='listarReportes') {
            require_once('docs/public/core/rap/plantillas/reports/listarReportes.php');
        }
        if ($_GET['menu']=='listarAreas') {
            require_once('docs/public/core/rap/plantillas/area/listarAreas.php');
        }
        if ($_GET['menu']=='logrosEstudiantes') {
            require_once('docs/public/core/rap/plantillas/logros/logrosEstudiantes.php');
        }
        if ($_GET['menu']=='logrosGlobales') {
            require_once('docs/public/core/rap/plantillas/logros/logrosGlobales.php');
        }
        if ($_GET['menu']=='listadoAcciones') {
            require_once('docs/public/core/rap/plantillas/acciones/listarAcciones.php');
        }
        if ($_GET['menu']=='listadoLogros') {
            require_once('docs/public/core/rap/plantillas/listadoEstudiantes/listadoLogros.php');
        }

        #Registros
        if ($_GET['menu']=='registrarEstudiante') {
            require_once('docs/public/core/rap/plantillas/estudiantes/registrarEstudiante.php');
        }
        if ($_GET['menu']=='generarReporte') {
            require_once('docs/public/core/rap/plantillas/reports/generarReporte.php');
        }
        if ($_GET['menu']=='registrarAreas') {
            require_once('docs/public/core/rap/plantillas/area/registrarAreas.php');
        }
        if ($_GET['menu']=='registrarAccion') {
            require_once('docs/public/core/rap/plantillas/acciones/registrarAccion.php');
        }

        #Perfil de Usuario
        if ($_GET['menu']=='perfildeUsuario') {
            require_once('docs/public/core/rap/plantillas/profile/perfil.php');
        }
    }

?>