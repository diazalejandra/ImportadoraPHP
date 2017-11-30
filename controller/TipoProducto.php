<?php

require_once '../config/ConexionDB.php';
require_once '../model/TipoProductoModel.php';

class TipoProducto{

    public function listar() {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_tipoproducto, descripcion_tipo FROM tipo_producto");
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new TipoProductoModel();
                $dto->setId_tipoproducto($value["id_tipoproducto"]);
                $dto->setDescripcion_tipo($value["descripcion_tipo"]);
                $lista[] = $dto;
            }
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return $lista;
    }

    public function crear($dto) {
        try {
            $db = new ConexionDB();
            $id_tipoproducto = $dto->getId_tipoproducto();
            $descripcion_tipo = $dto->getDescripcion_tipo();

            $stmt = $db->prepare("INSERT INTO tipo_producto (descripcion_tipo) VALUES(?)");
            $stmt->bindParam(1, $descripcion_tipo);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }

    public function eliminar($id_tipoproducto) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("DELETE FROM tipo_producto WHERE id_tipoproducto = ?");
            $stmt->bindParam(1, $id_tipoproducto);
            $respuesta = $stmt->execute();
        } catch (Exception $exc) {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function ver($id_tipoproducto) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_tipoproducto, descripcion_tipo FROM tipo_producto WHERE id_tipoproducto = ?");
            $stmt->bindParam(1, $id_tipoproducto);
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new TipoProductoModel();
                $dto->setId_tipoproducto($value["id_tipoproducto"]);
                $dto->setDescripcion_tipo($value["descripcion_tipo"]);
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
            $id_tipoproducto = $dto->getId_tipoproducto();
            $descripcion_tipo = $dto->getDescripcion_tipo();

            $stmt = $db->prepare("UPDATE tipo_producto SET descripcion_tipo = ? WHERE id_tipoproducto = ?");
            $stmt->bindParam(1, $descripcion_tipo);
            $stmt->bindParam(2, $id_tipoproducto);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }
}
