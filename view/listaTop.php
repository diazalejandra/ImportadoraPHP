<?php
include_once '../controller/Producto.php';
include_once '../model/ProductoModel.php';

$lista = Producto::listarTop();
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
                    <legend>Productos mas vendidos</legend>

                    <table class='table table-hover table-responsive'>
                        <tr> 
                            <th> Cantidad Ventas </th> 
                            <th> Producto </th> 
                            <th> Precio Unitario </th> 
                        </tr>
                        <?php
                        for ($i = 0; $i < count($lista); $i++) {
                            echo "<tr> ";
                            echo "<td> " . $lista[$i]->getVentas() . "</td> ";
                            echo "<td> " . $lista[$i]->getDescripcion() . "</td> ";
                            echo "<td> " . $lista[$i]->getPrecio_unidad() . "</td> ";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </fieldset>
            </form>
        </section>
    </body>
</html>