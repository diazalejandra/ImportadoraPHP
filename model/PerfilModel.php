<?php

class PerfilModel implements JsonSerializable {

    private $id_perfil;
    private $descripcion_perfil;

    function __construct() {
    }

    function getId_perfil() {
        return $this->id_perfil;
    }

    function getDescripcion_perfil() {
        return $this->descripcion_perfil;
    }

    function setId_perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }

    function setDescripcion_perfil($descripcion_perfil) {
        $this->descripcion_perfil = $descripcion_perfil;
    }

    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_perfil"] = $this->id_perfil_oc;
        $jsonArray["descripcion_perfil"] = $this->descripcion_perfil;

        return $jsonArray;
    }

}
