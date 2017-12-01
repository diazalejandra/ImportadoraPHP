<?php
include_once '../controller/Producto.php';
include_once '../controller/TipoProducto.php';
include_once '../model/TipoProductoModel.php';
$lista = TipoProducto::listar();

if (isset($_POST['btn_registro'])) {
    $producto = new ProductoModel();
    $producto->setDescripcion($_POST['producto']);
    $producto->setPrecio_unidad($_POST['precio_producto']);
    $producto->setId_tipo($_POST['cmb_tipo']);

    if (Producto::crear($producto)) {
        echo "<script type=\"text/javascript\"> alert(\"Producto creado\");</script>";
    } else {
        echo "<script type=\"text/javascript\"> alert(\"Error al crear producto\");</script>";
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
                <legend>Producto</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="producto">Producto</label>  
                    <div class="col-md-4">
                        <input id="producto" name="producto" id="producto" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="precio_producto">Precio</label>  
                    <div class="col-md-4">
                        <input id="precio_producto" name="precio_producto" id="precio_producto" type="number" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cmb_tipo">Tipo Producto</label>
                    <div class="col-md-4">
                        <select id="cmb_tipo" name="cmb_tipo" required>
                            <option value="">--- Selecionar ---</option>
                            <?php foreach ($lista as $value) { ?>
                            <option value="<?php echo $value->getId_tipoproducto(); ?>"><?php echo $value->getDescripcion_tipo(); ?></option>
                            <?php } ?>
                        </select>  
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
                    "url": "buscarProducto.php",
                    "method": "POST",
                    "data": {"producto": "producto"}
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
                        "url": "buscarProducto.php",
                        "method": "POST",
                        "data": {"id_producto": id}
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