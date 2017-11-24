<?php

include_once '../db/conexion.php';
include_once '../dto/usuarioDTO.php';

class usuarioDAO implements genericDAO {

    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregar($registro) {
        
    }

    public function eliminar($idRegistro) {
        
    }

    public function actualizar($registro) {
        
    }

    public function listarTodos() {
        
    }

}
