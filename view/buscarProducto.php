<?php

include_once '../controller/Producto.php';
include_once '../model/ProductoModel.php';

    if (Producto::listar() != null){
        $lista = Producto::listar();
        echo "<table class='table table-hover table-responsive'>";
        echo "<tr> ";
        echo "<th> ID </th> ";
        echo "<th> Descripcion </th> ";
        echo "<th> Precio Unidad </th> ";
        echo "<th> Opciones </th> ";
        echo "</tr>";
        for ($i = 0; $i < count($lista); $i++) {
            echo "<tr> ";
            echo "<td> " . $lista[$i]->getId_producto() . "</td> ";
            echo "<td> " . $lista[$i]->getDescripcion() . "</td> ";
            echo "<td> " . $lista[$i]->getPrecio_unidad() . "</td> ";
            echo "<td> <input type=\"button\" class=\"btn_eliminar\" value=\"Eliminar\" attr-id=\"" . $lista[$i]->getId_producto() . "\" /></td> ";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "No existe informacion para mostrar";
    }
    
if(isset($_POST["id_producto"])){
if (!Producto::eliminar($_POST["id_producto"])) {
    echo "<script type=\"text/javascript\"> alert(\"No se ha podido eliminar.\");</script>";
} else {

    echo "<script type=\"text/javascript\"> alert(\"Se ha eliminado el producto.\");</script>";
}
}


