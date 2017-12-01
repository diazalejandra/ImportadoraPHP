<?php
include_once '../controller/OrdenCompra.php';
include_once '../model/OrdenCompraModel.php';

$lista = OrdenCompra::listarTop();
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
                    <legend>Top Ordenes de Compra (fecha)</legend>

                    <table class='table table-hover table-responsive'>
                        <tr> 
                            <th> Cantidad Ventas </th> 
                            <th> Fecha de Emision </th> 
                            <th> Total </th> 
                            <th> Estado </th> 
                        </tr>
                        <?php
                        for ($i = 0; $i < count($lista); $i++) {
                            echo "<tr> ";
                            echo "<td> " . $lista[$i]->getVentas() . "</td> ";
                            echo "<td> " . $lista[$i]->getFecha_emision() . "</td> ";
                            echo "<td> " . $lista[$i]->getTotal_oc() . "</td> ";
                            echo "<td> " . $lista[$i]->getEstado() . "</td> ";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </fieldset>
            </form>
        </section>
    </body>
</html>