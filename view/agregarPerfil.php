<?php
include_once '../controller/Perfil.php';
include_once '../model/PerfilModel.php';

if (isset($_POST['btn_registro'])) {
    $perfil = new PerfilModel();
    $perfil->setId_perfil($_POST['id_perfil']);
    $perfil->setDescripcion_perfil($_POST['tipo_perfil']);

    if (Perfil::crear($perfil)) {
        echo "<script type=\"text/javascript\"> alert(\"Perfil creado\");</script>";
    } else {
        echo "<script type=\"text/javascript\"> alert(\"Error al crear perfil\");</script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Importadora LTT</title>
    </head>
    <body>
        <?php
        include_once 'partial/header.php';
        ?>
        <section class="container">
        <form class="form-horizontal" action="" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend>Tipo de Producto</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="id_perfil">Codigo Perfil</label>  
                    <div class="col-md-4">
                        <input id="id_perfil" name="id_perfil" id="id_perfil" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tipo_perfil">Perfil</label>  
                    <div class="col-md-4">
                        <input id="tipo_perfil" name="tipo_perfil" id="tipo_perfil" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btn_registro"></label>
                    <div class="col-md-4">
                        <button id="btn_registro" name="btn_registro" class="btn btn-primary">Agregar</button>
                        <button id="btn_listar" type="button" name="btn_listar" class="btn btn-primary">Listar</button>
                    </div>
                </div>

            </fieldset>
        </form>
        
        <div class="resultado"></div>
        </section>
        
    <script>
        $(document).ready(function () {

            $("#btn_listar").on("click", function (event) {
                agregar();
            });

            function agregar() {
                var settings = {
                    "url": "buscarPerfil.php",
                    "method": "POST",
                    "data": {"tipo_perfil": "tipo_perfil"}
                }

                $.ajax(settings).done(function (response) {
                    $('.resultado').html('');
                    $('.resultado').html(response)
                    eliminar();
                });
            }

            function eliminar() {
                $(".btn_eliminar").on("click", function (e) {
                    var id = $(this).attr("attr-id");
                    var settings = {
                        "url": "buscarPerfil.php",
                        "method": "POST",
                        "data": {"id_perfil": id}
                    }

                    $.ajax(settings).done(function (response) {
//                        $('.resultadoEli').html('');
//                        $('.resultadoEli').html(response)
                        agregar();
                    });
                });
            }
        });

    </script>

    </body>
</html>