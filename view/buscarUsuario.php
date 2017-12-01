<?php

include_once '../controller/Usuario.php';
include_once '../model/UsuarioModel.php';

    if (Usuario::listar() != null){
        $lista = Usuario::listar();
        echo "<table class='table table-hover table-responsive'>";
        echo "<tr> ";
        echo "<th> ID </th> ";
        echo "<th> Login </th> ";
        echo "<th> Nombre </th> ";
        echo "<th> Apellido </th> ";
        echo "<th> Correo </th> ";
        echo "<th> Edad </th> ";
        echo "<th> Opciones </th> ";
        echo "</tr>";
        for ($i = 0; $i < count($lista); $i++) {
            echo "<tr> ";
            echo "<td> " . $lista[$i]->getId_usuario() . "</td> ";
            echo "<td> " . $lista[$i]->getLogin_usuario() . "</td> ";
            echo "<td> " . $lista[$i]->getNombre_usuario() . "</td> ";
            echo "<td> " . $lista[$i]->getApellido_usuario() . "</td> ";
            echo "<td> " . $lista[$i]->getCorreo_usuario() . "</td> ";
            echo "<td> " . $lista[$i]->getEdad_usuario() . "</td> ";
            echo "<td> <input type=\"button\" class=\"btn_eliminar\" value=\"Eliminar\" attr-id=\"" . $lista[$i]->getId_usuario() . "\" /></td> ";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "No existe informacion para mostrar";
    }
    
if(isset($_POST["id_usuario"])){
if (!Usuario::eliminar($_POST["id_usuario"])) {
    echo "<script type=\"text/javascript\"> alert(\"No se ha podido eliminar.\");</script>";
} else {

    echo "<script type=\"text/javascript\"> alert(\"Se ha eliminado el usuario.\");</script>";
}
}


