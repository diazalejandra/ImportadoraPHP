<?php

require_once '../config/ConexionDB.php';
require_once '../model/ProductoModel.php';

class Producto {

    public function listar() {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_producto, descripcion, precio_unidad, id_tipo FROM producto");
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new ProductoModel();
                $dto->setId_producto($value["id_producto"]);
                $dto->setDescripcion($value["descripcion"]);
                $dto->setPrecio_unidad($value["precio_unidad"]);
                $dto->setId_tipo($value["id_tipo"]);
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
            $id_producto = $dto->getId_producto();
            $descripcion = $dto->getDescripcion();
            $precio_unidad = $dto->getPrecio_unidad();
            $id_tipo = $dto->getId_tipo();

            $stmt = $db->prepare("INSERT INTO producto(descripcion, precio_unidad, id_tipo) VALUES(?,?,?,?)");
            $stmt->bindParam(1, $descripcion);
            $stmt->bindParam(2, $precio_unidad);
            $stmt->bindParam(3, $id_tipo);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }

    public function eliminar($id_producto) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("DELETE FROM producto WHERE id_producto = ?");
            $stmt->bindParam(1, $id_producto);
            $respuesta = $stmt->execute();
        } catch (Exception $exc) {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function ver($id_producto) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_producto, descripcion, precio_unidad, id_tipo FROM producto WHERE id_producto = ?");
            $stmt->bindParam(1, $id_producto);
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new ProductoModel();
                $dto->setId_producto($value["id_producto"]);
                $dto->setDescripcion($value["descripcion"]);
                $dto->setPrecio_unidad($value["precio_unidad"]);
                $dto->setId_tipo($value["id_tipo"]);
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
            $id_producto = $dto->getId_producto();
            $descripcion = $dto->getDescripcion();
            $precio_unidad = $dto->getPrecio_unidad();
            $id_tipo = $dto->getId_tipo();

            $stmt = $db->prepare("UPDATE producto SET descripcion = ?, precio_unidad = ?, id_tipo = ? WHERE id_producto = ?");
            $stmt->bindParam(1, $descripcion);
            $stmt->bindParam(2, $precio_unidad);
            $stmt->bindParam(3, $id_tipo);
            $stmt->bindParam(4, $id_producto);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }
}
