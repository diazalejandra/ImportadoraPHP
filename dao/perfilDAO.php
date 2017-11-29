<?php

include_once '../dto/perfilDTO.php';

class perfilDAO implements genericDAO{

       private $perfil;

    public function __construct() {
        $this->perfil = new perfilDTO();
    }

    public function actualizar($id_perfil, $descripcion_perfil) {
        $this->perfil->set('id_perfil', $id_perfil);
        $this->perfil->set('descripcion_perfil', $descripcion_perfil);
        $this->perfil->editar();
    }

    public function agregar($id_perfil, $descripcion_perfil) {
        $this->perfil->set('id_perfil', $id_perfil);
        $this->perfil->set('descripcion_perfil', $descripcion_perfil);
        $resultado = $this->perfil->crear();
        return $resultado;
    }

    public function eliminar($id_perfil) {
        $this->perfil->set("id_perfil", $id_perfil);
        $this->perfil->eliminar();
    }

    public function listar() {
        $resultado = $this->perfil->listar();
        return $resultado;
    }

    public function mostrar($id_perfil) {
        $this->perfil->set("id_perfil", $id_perfil);
        $datos = $this->perfil->ver();
        return $datos;
    }

}
