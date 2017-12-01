<?php

include_once '../controller/TipoProducto.php';
include_once '../model/TipoProductoModel.php';

    if (TipoProducto::listar() != null){
        $lista = TipoProducto::listar();
        echo "<table class='table table-hover table-responsive'>";
        echo "<tr> ";
        echo "<th> ID </th> ";
        echo "<th> Descripcion </th> ";
        echo "<th> Opciones </th> ";
        echo "</tr>";
        for ($i = 0; $i < count($lista); $i++) {
            echo "<tr> ";
            echo "<td> " . $lista[$i]->getId_tipoproducto() . "</td> ";
            echo "<td> " . $lista[$i]->getDescripcion_tipo() . "</td> ";
            echo "<td> <input type=\"button\" class=\"btn_eliminar\" value=\"Eliminar\" attr-id=\"" . $lista[$i]->getId_tipoproducto() . "\" /></td> ";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "No existe informacion para mostrar";
    }
    
if(isset($_POST["id_tipoproducto"])){
if (!TipoProducto::eliminar($_POST["id_tipoproducto"])) {
    echo "<script type=\"text/javascript\"> alert(\"No se ha podido eliminar.\");</script>";
} else {

    echo "<script type=\"text/javascript\"> alert(\"Se ha eliminado el producto.\");</script>";
}
}


