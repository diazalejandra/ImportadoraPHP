<?php

include_once '../controller/Perfil.php';
include_once '../model/PerfilModel.php';

    if (Perfil::listar() != null){
        $lista = Perfil::listar();
        echo "<table class='table table-hover table-responsive'>";
        echo "<tr> ";
        echo "<th> Codigo </th> ";
        echo "<th> Descripcion </th> ";
        echo "<th> Opciones </th> ";
        echo "</tr>";
        for ($i = 0; $i < count($lista); $i++) {
            echo "<tr> ";
            echo "<td> " . $lista[$i]->getId_perfil() . "</td> ";
            echo "<td> " . $lista[$i]->getDescripcion_perfil() . "</td> ";
            echo "<td> <input type=\"button\" class=\"btn_eliminar\" value=\"Eliminar\" attr-id=\"" . $lista[$i]->getId_perfil() . "\" /></td> ";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "No existe informacion para mostrar";
    }
    
if(isset($_POST["id_perfil"])){
if (!Perfil::eliminar($_POST["id_perfil"])) {
    echo "<script type=\"text/javascript\"> alert(\"No se ha podido eliminar.\");</script>";
} else {

    echo "<script type=\"text/javascript\"> alert(\"Se ha eliminado el perfil.\");</script>";
}
}


