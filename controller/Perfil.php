<?php

require_once './config/ConexionDB.php';
require_once './model/PerfilModel.php';

class Perfil {

    public static function listar() {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_perfil, descripcion_perfil FROM perfil");
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new PerfilModel();
                $dto->setId_perfil($value["id_perfil"]);
                $dto->setDescripcion_perfil($value["descripcion_perfil"]);
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
            $id_perfil = $dto->getId_perfil();
            $descripcion_perfil = $dto->getDescripcion_perfil();

            $stmt = $db->prepare("INSERT INTO perfil (id_perfil, descripcion_perfil) VALUES(?,?)");
            $stmt->bindParam(1, $id_perfil);
            $stmt->bindParam(2, $descripcion_perfil);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }

    public function eliminar($id_perfil) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("DELETE FROM perfil WHERE id_perfil = ?");
            $stmt->bindParam(1, $id_perfil);
            $respuesta = $stmt->execute();
        } catch (Exception $exc) {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function ver($id_perfil) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_perfil, descripcion_perfil FROM perfil WHERE id_perfil = ?");
            $stmt->bindParam(1, $id_perfil);
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new PerfilModel();
                $dto->setId_perfil($value["id_perfil"]);
                $dto->setDescripcion_perfil($value["descripcion_perfil"]);
                $lista[] = $dto;
            }
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return $lista;
    }

    public function editar($dto) {
        try {
            $db = new ConexionDB();
            $id_perfil = $dto->getId_perfil();
            $descripcion_perfil = $dto->getDescripcion_perfil();

            $stmt = $db->prepare("UPDATE perfil SET descripcion_perfil = ? WHERE id_perfil = ?");
            $stmt->bindParam(1, $descripcion_perfil);
            $stmt->bindParam(2, $id_perfil);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }

}
