<?php

include_once '../dto/usuarioDTO.php';

class usuarioDAO implements genericDAO {

   private $usuario;

    public function __construct() {
        $this->usuario = new usuarioDTO();
    }

    public function actualizar($id_usuario, $login_usuario, $pass_usuario, $nombre_usuario, $apellido_usuario, $correo_usuario, $edad_usuario, $codigo_perfil, $fechaNacimiento_usuario) {
        $this->usuario->set('id_usuario', $id_usuario);
        $this->usuario->set('login_usuario', $login_usuario);
        $this->usuario->set('pass_usuario', $pass_usuario);
        $this->usuario->set('nombre_usuario', $nombre_usuario);
        $this->usuario->set('apellido_usuario', $apellido_usuario);
        $this->usuario->set('correo_usuario', $correo_usuario);
        $this->usuario->set('edad_usuario', $edad_usuario);
        $this->usuario->set('codigo_perfil', $codigo_perfil);
        $this->usuario->set('fechaNacimiento_usuario', $fechaNacimiento_usuario);
        $this->usuario->editar();
    }

    public function agregar($login_usuario, $pass_usuario, $nombre_usuario, $apellido_usuario, $correo_usuario, $edad_usuario, $codigo_perfil, $fechaNacimiento_usuario) {
        $this->usuario->set('login_usuario', $login_usuario);
        $this->usuario->set('pass_usuario', $pass_usuario);
        $this->usuario->set('nombre_usuario', $nombre_usuario);
        $this->usuario->set('apellido_usuario', $apellido_usuario);
        $this->usuario->set('correo_usuario', $correo_usuario);
        $this->usuario->set('edad_usuario', $edad_usuario);
        $this->usuario->set('codigo_perfil', $codigo_perfil);
        $this->usuario->set('fechaNacimiento_usuario', $fechaNacimiento_usuario);
        $resultado = $this->usuario->crear();
        return $resultado;
    }

    public function eliminar($id_usuario) {
        $this->usuario->set('id_usuario', $id_usuario);
        $this->usuario->eliminar();
    }

    public function listar() {
        $resultado = $this->usuario->listar();
        return $resultado;
    }

    public function mostrar($id_usuario) {
        $this->usuario->set('id_usuario', $id_usuario);
        $datos = $this->usuario->ver();
        return $datos;
    }
}
