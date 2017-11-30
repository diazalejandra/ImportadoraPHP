<?php

class TipoProductoModel implements JsonSerializable {
    private $id_tipoproducto;
    private $descripcion_tipo;
        
    function __construct() {
    }

    function getId_tipoproducto() {
        return $this->id_tipoproducto;
    }

    function getDescripcion_tipo() {
        return $this->descripcion_tipo;
    }

    function setId_tipoproducto($id_tipoproducto) {
        $this->id_tipoproducto = $id_tipoproducto;
    }

    function setDescripcion_tipo($descripcion_tipo) {
        $this->descripcion_tipo = $descripcion_tipo;
    }
        
    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_tipoproducto"] = $this->id_tipoproducto;
        $jsonArray["descripcion_tipo"] = $this->descripcion_tipo;

        return $jsonArray;
    }
}
