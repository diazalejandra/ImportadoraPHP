<?php
include_once '../controller/TipoProducto.php';
include_once '../model/TipoProductoModel.php';

if (isset($_POST['btn_registro'])) {
    $producto = new TipoProductoModel();
    $producto->setDescripcion_tipo($_POST['tipo_producto']);

    if (TipoProducto::crear($producto)) {
        echo "<script type=\"text/javascript\"> alert(\"Tipo de producto creado\");</script>";
        echo "<script>location.href='index.php';</script>";
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
        <form class="form-horizontal" action="" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend>Agregar Tipo Producto</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tipo_producto">Tipo Producto</label>  
                    <div class="col-md-4">
                        <input id="tipo_producto" name="tipo_producto" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btn_registro"></label>
                    <div class="col-md-4">
                        <button id="btn_registro" name="btn_registro" class="btn btn-primary">Agregar</button>
                    </div>
                </div>

            </fieldset>
        </form>

        <?php
        include_once 'partial/footer.php';
        ?>
    </body>
</html>