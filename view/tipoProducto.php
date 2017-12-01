<?php
include_once '../controller/TipoProducto.php';
include_once '../model/TipoProductoModel.php';

if (isset($_POST['btn_registro'])) {
    $producto = new TipoProductoModel();
    $producto->setDescripcion_tipo($_POST['tipo_producto']);

    if (TipoProducto::crear($producto)) {
        echo "<script type=\"text/javascript\"> alert(\"Tipo de producto creado\");</script>";
    } else {
        echo "<script type=\"text/javascript\"> alert(\"Error al crear tipo producto\");</script>";
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
                    <label class="col-md-4 control-label" for="tipo_producto">Tipo Producto</label>  
                    <div class="col-md-4">
                        <input id="tipo_producto" name="tipo_producto" id="tipo_producto" type="text" placeholder="" class="form-control input-md" required="">

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
                    "url": "buscarTipoProducto.php",
                    "method": "POST",
                    "data": {"tipo_producto": "tipo_producto"}
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
                        "url": "buscarTipoProducto.php",
                        "method": "POST",
                        "data": {"id_tipoproducto": id}
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