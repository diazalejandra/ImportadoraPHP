<?php

class OrdenCompraModel implements JsonSerializable {

    private $id_oc;
    private $fecha_emision;
    private $total_oc;
    private $estado;
    private $id_usuario;

    function __construct() {
        
    }

    function getId_oc() {
        return $this->id_oc;
    }

    function getFecha_emision() {
        return $this->fecha_emision;
    }

    function getTotal_oc() {
        return $this->total_oc;
    }

    function getEstado() {
        return $this->estado;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_oc($id_oc) {
        $this->id_oc = $id_oc;
    }

    function setFecha_emision($fecha_emision) {
        $this->fecha_emision = $fecha_emision;
    }

    function setTotal_oc($total_oc) {
        $this->total_oc = $total_oc;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_oc"] = $this->id_oc;
        $jsonArray["fecha_emision"] = $this->fecha_emision;
        $jsonArray["total_oc"] = $this->total_oc;
        $jsonArray["estado"] = $this->estado;
        $jsonArray["id_usuario"] = $this->id_usuario;

        return $jsonArray;
    }
}
