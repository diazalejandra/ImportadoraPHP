<?php
include_once '../db/conexion.php';
include_once '../dto/tipoProductoDTO.php';

class tipoProductoDAO implements genericDAO {

    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function actualizar($registro) {
        
    }

    public function agregar($registro) {
        
    }

    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        
    }

}
