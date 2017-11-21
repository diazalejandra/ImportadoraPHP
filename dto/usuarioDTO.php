<?php

class usuarioDTO {
    private $id_usuario;
    private $login_usuario;
    private $pass_usuario;
    private $nombre_usuario;
    private $apellido_usuario;
    private $correo_usuario;
    private $edad_usuario;
    private $codigo_perfil;
    private $fechaNacimiento_usuario;
    
    function __construct() {
        
    }
    
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getLogin_usuario() {
        return $this->login_usuario;
    }

    function getPass_usuario() {
        return $this->pass_usuario;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getApellido_usuario() {
        return $this->apellido_usuario;
    }

    function getCorreo_usuario() {
        return $this->correo_usuario;
    }

    function getEdad_usuario() {
        return $this->edad_usuario;
    }

    function getCodigo_perfil() {
        return $this->codigo_perfil;
    }

    function getFechaNacimiento_usuario() {
        return $this->fechaNacimiento_usuario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setLogin_usuario($login_usuario) {
        $this->login_usuario = $login_usuario;
    }

    function setPass_usuario($pass_usuario) {
        $this->pass_usuario = $pass_usuario;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setApellido_usuario($apellido_usuario) {
        $this->apellido_usuario = $apellido_usuario;
    }

    function setCorreo_usuario($correo_usuario) {
        $this->correo_usuario = $correo_usuario;
    }

    function setEdad_usuario($edad_usuario) {
        $this->edad_usuario = $edad_usuario;
    }

    function setCodigo_perfil($codigo_perfil) {
        $this->codigo_perfil = $codigo_perfil;
    }

    function setFechaNacimiento_usuario($fechaNacimiento_usuario) {
        $this->fechaNacimiento_usuario = $fechaNacimiento_usuario;
    }
}
?>

