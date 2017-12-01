<?php
include_once '../controller/OrdenCompra.php';
include_once '../controller/DetalleOC.php';
include_once '../controller/Producto.php';
include_once '../model/OrdenCompraModel.php';
include_once '../model/DetalleOCModel.php';
include_once '../model/ProductoModel.php';
$lista = Producto::listar();

if (isset($_POST['btn_registro'])) {
    $oc = new OrdenCompraModel();
    $oc->setFecha_emision($_POST['fecha_oc']);
    $oc->setEstado($_POST['estado_oc']);
    $oc->setId_usuario(3);
    $oc->setTotal_oc($_POST['total']);

    if (OrdenCompra::crear($oc)) {
        $do = new DetalleOCModel();
        $do->setId_oc(OrdenCompra::obtenerId());
        $do->setId_producto($_POST['cmb_producto']);
        $do->setCantidad($_POST['cantidad_producto']);
        $do->setSub_total($_POST['total']);
        if (DetalleOC::crear($do)) {
            echo "<script type=\"text/javascript\"> alert(\"Orden de compra creada\");</script>";
        } else {
            echo "<script type=\"text/javascript\"> alert(\"Error al crear Orden de Compra\");</script>";
        }
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
                    <legend>Agregar Orden de Compra</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fecha_oc">Fecha</label>  
                        <div class="col-md-4">
                            <input id="fecha_oc" name="fecha_oc" type="date" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="estado_oc">Estado</label>  
                        <div class="col-md-4">
                            <input id="estado_oc" name="estado_oc" type="text" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="cmb_producto">Producto</label>
                        <div class="col-md-4">
                        <select id="cmb_producto" name="cmb_producto" required>
                            <option value="">Selecionar Producto</option>
                            <?php foreach ($lista as $value) { ?>
                            <option value="<?php echo $value->getId_producto(); ?>"><?php echo $value->getDescripcion(); ?></option>
                            <?php } ?>
                        </select>  
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="cantidad_producto">Cantidad</label>  
                        <div class="col-md-4">
                            <input id="cantidad_producto" name="cantidad_producto" type="number" placeholder="" class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="total">Total</label>  
                        <div class="col-md-4">
                            <input id="total" name="total" type="text" placeholder=" " class="form-control input-md" required="">
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
                        "url": "buscarOC.php",
                        "method": "POST",
                        "data": {"oc": "oc"}
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
                            "url": "buscarOC.php",
                            "method": "POST",
                            "data": {"id_oc": id}
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