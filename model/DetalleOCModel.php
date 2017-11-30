<?php

class DetalleOCModel implements JsonSerializable {

    private $id_oc;
    private $id_producto;
    private $cantidad;
    private $sub_total;

    function __construct() {
        
    }

    function getId_oc() {
        return $this->id_oc;
    }

    function getId_producto() {
        return $this->id_producto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getSub_total() {
        return $this->sub_total;
    }

    function setId_oc($id_oc) {
        $this->id_oc = $id_oc;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setSub_total($sub_total) {
        $this->sub_total = $sub_total;
    }

    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_oc"] = $this->id_oc;
        $jsonArray["id_producto"] = $this->id_producto;
        $jsonArray["cantidad"] = $this->cantidad;
        $jsonArray["sub_total"] = $this->sub_total;

        return $jsonArray;
    }

}
