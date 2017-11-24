<?php

class productoDTO implements JsonSerializable {

    private $id_producto, $descripcion, $precio_unidad, $id_tipo;

    function __construct() {
        
    }

    function getId_producto() {
        return $this->id_producto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio_unidad() {
        return $this->precio_unidad;
    }

    function getId_tipo() {
        return $this->id_tipo;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio_unidad($precio_unidad) {
        $this->precio_unidad = $precio_unidad;
    }

    function setId_tipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_producto"] = $this->id_productooc;
        $jsonArray["descripcion"] = $this->descripcion;
        $jsonArray["precio_unidad"] = $this->precio_unidad;
        $jsonArray["id_tipo"] = $this->id_tipo;

        return $jsonArray;
    }

}
