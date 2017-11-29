<?php

include_once '../dto/tipoProductoDTO.php';

class tipoProductoDAO implements genericDAO {

   private $tipo;

    public function __construct() {
        $this->tipo = new tipoProductoDTO();
    }

    public function actualizar($id_tipoproducto, $descripcion_tipo) {
        $this->tipo->set('id_tipoproducto', $id_tipoproducto);
        $this->tipo->set('descripcion_tipo', $descripcion_tipo);
        $this->tipo->editar();
    }

    public function agregar($descripcion_tipo) {
        $this->tipo->set('descripcion_tipo', $descripcion_tipo);
        $resultado = $this->tipo->crear();
        return $resultado;
    }

    public function eliminar($id_tipoproducto) {
        $this->tipo->set("id_tipoproducto", $id_tipoproducto);
        $this->tipo->eliminar();
    }

    public function listar() {
        $resultado = $this->tipo->listar();
        return $resultado;
    }

    public function mostrar($id_tipoproducto) {
        $this->tipo->set("id_tipoproducto", $id_tipoproducto);
        $datos = $this->tipo->ver();
        return $datos;
    }

}
