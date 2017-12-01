<?php

include_once '../config/ConexionDB.php';
include_once '../model/UsuarioModel.php';

class Usuario {

    public static function listar() {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_usuario, login_usuario, pass_usuario, nombre_usuario, apellido_usuario, correo_usuario,"
                    . " edad_usuario, codigo_perfil, fechaNacimiento_usuario FROM usuario");
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new UsuarioModel();
                $dto->setId_usuario($value["id_usuario"]);
                $dto->setLogin_usuario($value["login_usuario"]);
                $dto->setPass_usuario($value["pass_usuario"]);
                $dto->setNombre_usuario($value["nombre_usuario"]);
                $dto->setApellido_usuario($value["apellido_usuario"]);
                $dto->setCorreo_usuario($value["correo_usuario"]);
                $dto->setEdad_usuario($value["edad_usuario"]);
                $dto->setCodigo_perfil($value["codigo_perfil"]);
                $dto->setFechaNacimiento_usuario($value["fechaNacimiento_usuario"]);
                $lista[] = $dto;
            }
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return $lista;
    }

    public static function crear($dto) {
        try {
            $db = new ConexionDB();
            //$id_usuario = $dto->getId_usuario();
            $login_usuario = $dto->getLogin_usuario();
            $pass_usuario = $dto->getPass_usuario();
            $nombre_usuario = $dto->getNombre_usuario();
            $apellido_usuario = $dto->getApellido_usuario();
            $correo_usuario = $dto->getCorreo_usuario();
            $edad_usuario = $dto->getEdad_usuario();
            $codigo_perfil = $dto->getCodigo_perfil();
            $fechaNacimiento_usuario = $dto->getFechaNacimiento_usuario();

            $stmt = $db->prepare("INSERT INTO usuario (login_usuario, pass_usuario, nombre_usuario, apellido_usuario, correo_usuario,"
                    . " edad_usuario, codigo_perfil, fechaNacimiento_usuario) VALUES(?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $login_usuario);
            $stmt->bindParam(2, $pass_usuario);
            $stmt->bindParam(3, $nombre_usuario);
            $stmt->bindParam(4, $apellido_usuario);
            $stmt->bindParam(5, $correo_usuario);
            $stmt->bindParam(6, $edad_usuario);
            $stmt->bindParam(7, $codigo_perfil);
            $stmt->bindParam(8, $fechaNacimiento_usuario);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }

    public static function eliminar($id_usuario) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("DELETE FROM usuario WHERE id_usuario = ?");
            $stmt->bindParam(1, $id_usuario);
            $respuesta = $stmt->execute();
        } catch (Exception $exc) {
            $respuesta = false;
        }
        return $respuesta;
    }

    public static function ver($id_usuario) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_usuario, login_usuario, pass_usuario, nombre_usuario, apellido_usuario, correo_usuario,"
                    . " edad_usuario, codigo_perfil, fechaNacimiento_usuario FROM usuario WHERE id_usuario = ?");
            $stmt->bindParam(1, $id_usuario);
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new UsuarioModel();
                $dto->setId_usuario($value["id_usuario"]);
                $dto->setLogin_usuario($value["login_usuario"]);
                $dto->setPass_usuario($value["pass_usuario"]);
                $dto->setNombre_usuario($value["nombre_usuario"]);
                $dto->setApellido_usuario($value["apellido_usuario"]);
                $dto->setCorreo_usuario($value["correo_usuario"]);
                $dto->setEdad_usuario($value["edad_usuario"]);
                $dto->setCodigo_perfil($value["codigo_perfil"]);
                $dto->setFechaNacimiento_usuario($value["fechaNacimiento_usuario"]);
                $lista[] = $dto;
            }
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return $lista;
    }

    public static function editar($dto) {
        try {
            $db = new ConexionDB();
            $id_usuario = $dto->getId_usuario();
            $login_usuario = $dto->getLogin_usuario();
            $pass_usuario = $dto->getPass_usuario();
            $nombre_usuario = $dto->getNombre_usuario();
            $apellido_usuario = $dto->getApellido_usuario();
            $correo_usuario = $dto->getCorreo_usuario();
            $edad_usuario = $dto->getEdad_usuario();
            $codigo_perfil = $dto->getCodigo_perfil();
            $fechaNacimiento_usuario = $dto->getFechaNacimiento_usuario();

            $stmt = $db->prepare("UPDATE usuario SET login_usuario = ? , pass_usuario = ? , nombre_usuario = ? ,"
                    . " apellido_usuario = ? , correo_usuario = ? , edad_usuario = ? , codigo_perfil = ? ,"
                    . " fechaNacimiento_usuario = ?  WHERE id_usuario = ?");
            $stmt->bindParam(1, $login_usuario);
            $stmt->bindParam(2, $pass_usuario);
            $stmt->bindParam(3, $nombre_usuario);
            $stmt->bindParam(4, $apellido_usuario);
            $stmt->bindParam(5, $correo_usuario);
            $stmt->bindParam(6, $edad_usuario);
            $stmt->bindParam(7, $codigo_perfil);
            $stmt->bindParam(8, $fechaNacimiento_usuario);
            $stmt->bindParam(9, $id_usuario);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }
    
        public static function login($dto) {
        try {
            $db = new ConexionDB();
            $login_usuario = $dto->getLogin_usuario();
            $pass_usuario = $dto->getPass_usuario();

            $stmt = $db->prepare("SELECT login_usuario FROM usuario WHERE login_usuario = ? AND pass_usuario = ?");
            $stmt->bindParam(1, $login_usuario);
            $stmt->bindParam(2, $pass_usuario);
            $stmt->execute();
            if($stmt->rowCount() == 0){
                return false;
            }else{
                return true;
            }
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }
}
