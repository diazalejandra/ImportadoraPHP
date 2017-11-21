<?php

class Conectar {

    public static function conexion() {
        $conexion = new mysqli("localhost:3308", "root", "", "dbimportadora");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }

}

?>