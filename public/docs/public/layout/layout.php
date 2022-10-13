<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Icon-->
    <link rel="shortcut icon" href="docs/public/static/img/logoUCT.png" type="image/x-icon">

    <!--CSS Style-->
    <link rel="stylesheet" href="docs/public/static/css/style.css">

    <!-- CSS PARA DATATABLES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--CSS Bootstrap 4.6.1-->
    <link rel="stylesheet" href="https://librerias.uct.cl/bootstrap-4.6.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://librerias.uct.cl/bootstrap-4.6.1/css/bootstrap.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!--JQuery JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>


    <!--Bootstrap 4.6.1.-->
    <script src="https://librerias.uct.cl/bootstrap-4.6.1/js/bootstrap.bundle.js"></script>
    <script src="https://librerias.uct.cl/bootstrap-4.6.1/js/bootstrap.bundle.min.js"></script>


    <!--Data Tables JS-->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!--Select2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!--Datepicker-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!--SweetAlert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Static JS-->
    <script src="docs/public/static/js/script.js"></script>

    <!--Static JS Instrumentos-->
    <script src="docs/public/core/rap/static/instrumentos/js/list.js"></script>
    <script src="docs/public/core/rap/static/instrumentos/js/form.js"></script>
    <script src="docs/public/core/rap/static/instrumentos/js/update.js"></script>
    <script src="docs/public/core/rap/static/instrumentos/js/delete.js"></script>

    <!--Static JS Áreas-->
    <script src="docs/public/core/rap/static/areas/js/list.js"></script>
    <script src="docs/public/core/rap/static/areas/js/form.js"></script>
    <script src="docs/public/core/rap/static/areas/js/update.js"></script>
    <script src="docs/public/core/rap/static/areas/js/delete.js"></script>

    <!--Static JS Estudiantes-->
    <script src="docs/public/core/rap/static/estudiantes/js/list.js"></script>
    <script src="docs/public/core/rap/static/estudiantes/js/form.js"></script>

    <script src="docs/public/core/rap/static/logrosEstudiantes/js/list.js"></script>
    <script src="docs/public/core/rap/static/logrosEstudiantes/js/form.js"></script>
    <script src="docs/public/core/rap/static/logrosEstudiantes/js/list2.js"></script>
    <script src="docs/public/core/rap/static/logrosEstudiantes/js/delete.js"></script>


    <script src="docs/public/core/rap/static/listadoLogros/js/list.js"></script>

    <!--Static JS Globales-->
    <script src="docs/public/core/rap/static/logrosGlobales/js/list.js"></script>
    <script src="docs/public/core/rap/static/logrosGlobales/js/form.js"></script>
    
    <!--Static JS Acciones de Nivelación-->
    <script src="docs/public/core/rap/static/acciones/js/list.js"></script>
    <script src="docs/public/core/rap/static/acciones/js/form.js"></script>
    <script src="docs/public/core/rap/static/acciones/js/update.js"></script>
    <script src="docs/public/core/rap/static/acciones/js/delete.js"></script>

    <!--Archivo que da funcionalidad a los elementos select de los formularios.-->
    <script src="docs/public/core/rap/static/select/js/select.js"></script>

    <!--URL que permite exportar información a EXCEL-->
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>



    <!--Librerías para Datatables-->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <!--LIBRERÍAS PARA EXPORTAR A ARCHVIVOS-->
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

    <!--Librerías para Buttons de Datatable-->
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>


</head>

<body id="body">
    <!-- Site wrapper -->
    <div class="wrapper">


        <?php

        /*===================================================================
            HEADER
            ====================================================================*/
        include "docs/public/layout/header.php";

        /*===================================================================
            MENU LATERAL
            ====================================================================*/
        include "docs/public/layout/sidebar.php";

        /*===================================================================
            CONTENIDO DE LA PAGINA
            ====================================================================*/


        // content-wrapper
        echo '<div class="content-wrapper">';

        include "routing.php";

        echo '</div>';

        // .content-wrapper


        // ===================================================================
        // FOOTER
        // ====================================================================

        include "docs/public/layout/footer.php";

        ?>

    </div>

    <!-- ./wrapper -->

</body>

</html>