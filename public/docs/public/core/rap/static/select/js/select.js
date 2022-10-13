$(document).ready(function() {

    //SELECT PARA ASOCIAR CARRERA CON PLAN CARRERA
    $("#carrera").on("change", function() {
        var carr_codigo = $(this).val();

        if (carr_codigo) {
            $.ajax({
                type: "POST",
                url: "/docs/public/core/rap/view/instrumentos/query/plan_carrera.php",
                data: {
                    'carr_codigo': carr_codigo
                },
                success: function(html) {
                    $("#planCarrera").html(html);
                }
            });
        }
    });

    //SELECT PARA ASOCIAR EL TIPO DE INSTRUMENTO CON LA CARRERA Y EL PLAN CARRERA
    $("#planCarrera").on("change", function() {
        var plan_codigo = $(this).val();
        var carr_codigo = $("#carrera").val();

        if (plan_codigo) {
            $.ajax({
                type: "POST",
                url: "/docs/public/core/rap/view/areas/query/instrumentos.php",
                data: {
                    'carr_codigo': carr_codigo,
                    'plan_codigo': plan_codigo
                },
                success: function(html) {
                    $("#instrumento").html(html);
                }
            });
        }
    });

    //SELECT PARA ASOCIAR EL TIPO DE INSTRUMENTO CON LA CARRERA Y EL PLAN CARRERA
    $("#planCarrera2").on("change", function() {
        var plan_codigo = $(this).val();
        var carr_codigo = $("#cod_carrera").val();

        if (plan_codigo) {
            $.ajax({
                type: "POST",
                url: "/docs/public/core/rap/view/areas/query/instrumentos.php",
                data: {
                    'carr_codigo': carr_codigo,
                    'plan_codigo': plan_codigo
                },
                success: function(html) {
                    $("#instrumento2").html(html);
                }
            });
        }
    });

    //SELECT PARA LLENAR LA TABLA DE ÁREAS ASOCIADOS A LOS INSTRUMENTOS EN EL REGISTRO DE ESTUDIANTES.
    $("#instrumento2").on("change", function() {
        var tins_codigo = $(this).val();

        if (tins_codigo) {
            $.ajax({
                type: "POST",
                url: "/docs/public/core/rap/view/estudiantes/query/areas.php",
                data: {
                    'tins_codigo': tins_codigo,
                },
                success: function(html) {
                    $("#tblAreasEstudiantes").html(html);
                }
            });
        }
    });

    //SELECT PARA ASOCIAR CARRERA CON LOS INSTRUMENTOS
    $("#carreraAccion").on("change", function() {
        var carr_codigo = $(this).val();

        if (carr_codigo) {
            $.ajax({
                type: "POST",
                url: "/docs/public/core/rap/view/acciones/query/instrumentos.php",
                data: {
                    'carr_codigo': carr_codigo
                },
                success: function(html) {
                    $("#instrumento").html(html);
                }
            });
        }
    });

});