<?php

include_once '../controller/OrdenCompra.php';
include_once '../controller/DetalleOC.php';
include_once '../model/OrdenCompraModel.php';

    if (OrdenCompra::listar() != null){
        $lista = OrdenCompra::listar();
        echo "<table class='table table-hover table-responsive'>";
        echo "<tr> ";
        echo "<th> ID </th> ";
        echo "<th> Fecha de Emision </th> ";
        echo "<th> Total </th> ";
        echo "<th> Estado </th> ";
        echo "<th> Opciones </th> ";
        echo "</tr>";
        for ($i = 0; $i < count($lista); $i++) {
            echo "<tr> ";
            echo "<td> " . $lista[$i]->getId_oc(). "</td> ";
            echo "<td> " . $lista[$i]->getFecha_emision() . "</td> ";
            echo "<td> " . $lista[$i]->getTotal_oc() . "</td> ";
            echo "<td> " . $lista[$i]->getEstado() . "</td> ";
            echo "<td> <input type=\"button\" class=\"btn_eliminar\" value=\"Eliminar\" attr-id=\"" . $lista[$i]->getId_oc() . "\" /></td> ";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "No existe informacion para mostrar";
    }
    
if(isset($_POST["id_oc"])){
if (!OrdenCompra::eliminar($_POST["id_oc"])) {
    echo "<script type=\"text/javascript\"> alert(\"No se ha podido eliminar.\");</script>";
} else {
    DetalleOC::eliminar($id_oc);
    echo "<script type=\"text/javascript\"> alert(\"Se ha eliminado la orden de compra.\");</script>";
}
}


