<?php

include_once '../dto/ordenCompraDTO.php';

class ordenCompraDAO implements genericDAO {

    private $oc;

    public function __construct() {
        $this->oc = new ordencompraDTO();
    }

    public function actualizar($id_oc, $fecha_emision, $total_oc, $estado, $id_usuario) {
        $this->oc->set('id_oc', $id_oc);
        $this->oc->set('fecha_emision', $fecha_emision);
        $this->oc->set('total_oc', $total_oc);
        $this->oc->set('estado', $estado);
        $this->oc->set('id_usuario', $id_usuario);
        $this->oc->editar();
    }

    public function agregar($fecha_emision, $total_oc, $estado, $id_usuario) {
        $this->oc->set('fecha_emision', $fecha_emision);
        $this->oc->set('total_oc', $total_oc);
        $this->oc->set('estado', $estado);
        $this->oc->set('id_usuario', $id_usuario);
        $resultado = $this->oc->crear();
        return $resultado;
    }

    public function eliminar($id_oc) {
        $this->oc->set("id_oc", $id_oc);
        $this->oc->eliminar();
    }

    public function listar() {
        $resultado = $this->oc->listar();
        return $resultado;
    }

    public function mostrar($id_oc) {
        $this->oc->set("id_oc", $id_oc);
        $datos = $this->oc->ver();
        return $datos;
    }

}
