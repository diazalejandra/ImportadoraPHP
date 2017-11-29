<?php

include_once '../dto/detalleocDTO.php';

class detalleocDAO implements genericDAO {

    private $detalleoc;

    public function __construct() {
        $this->detalleoc = new detalleocDTO();
    }

    public function actualizar($id_oc, $id_producto, $cantidad, $sub_total) {
        $this->detalleoc->set('id_oc', $id_oc);
        $this->detalleoc->set('id_producto', $id_producto);
        $this->detalleoc->set('cantidad', $cantidad);
        $this->detalleoc->set('sub_total', $sub_total);
        $this->detalleoc->editar();
    }

    public function agregar($id_oc, $id_producto, $cantidad, $sub_total) {
        $this->detalleoc->set('id_oc', $id_oc);
        $this->detalleoc->set('id_producto', $id_producto);
        $this->detalleoc->set('cantidad', $cantidad);
        $this->detalleoc->set('sub_total', $sub_total);

        $resultado = $this->detalleoc->crear();
        return $resultado;
    }

    public function eliminar($id_oc) {
        $this->detalleoc->set("id_oc", $id_oc);
        $this->detalleoc->eliminar();
    }

    public function listar() {
        $resultado = $this->detalleoc->listar();
        return $resultado;
    }

    public function mostrar($id_oc) {
        $this->detalleoc->set("id_oc", $id_oc);
        $datos = $this->detalleoc->ver();
        return $datos;
    }
}
