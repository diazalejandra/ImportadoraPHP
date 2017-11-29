<?php

include_once '../dto/productoDTO.php';

class productoDAO implements genericDAO {

   private $producto;

    public function __construct() {
        $this->producto = new productoDTO();
    }

    public function actualizar($id_producto, $descripcion, $precio_unidad, $id_tipo) {
        $this->producto->set('id_producto', $id_producto);
        $this->producto->set('descripcion', $descripcion);
        $this->producto->set('precio_unidad', $precio_unidad);
        $this->producto->set('id_tipo', $id_tipo);
        $this->producto->editar();
    }

    public function agregar($descripcion, $precio_unidad, $id_tipo) {
        $this->producto->set('descripcion', $descripcion);
        $this->producto->set('precio_unidad', $precio_unidad);
        $this->producto->set('id_tipo', $id_tipo);
        $resultado = $this->producto->crear();
        return $resultado;
    }

    public function eliminar($id_producto) {
        $this->producto->set('id_producto', $id_producto);
        $this->producto->eliminar();
    }

    public function listar() {
        $resultado = $this->producto->listar();
        return $resultado;
    }

    public function mostrar($id_producto) {
        $this->producto->set('id_producto', $id_producto);
        $datos = $this->producto->ver();
        return $datos;
    }

}
