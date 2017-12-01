<?php

require_once '../config/ConexionDB.php';
require_once '../model/DetalleOCModel.php.php';

class DetalleOC {

    public static function listar() {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_oc, id_producto, cantidad, sub_total FROM detalle_oc");
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new DetalleOC();
                $dto->setId_oc($value["id_oc"]);
                $dto->setId_producto($value["id_producto"]);
                $dto->setCantidad($value["cantidad"]);
                $dto->setSub_total($value["sub_total"]);
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
            $id_oc = $dto->getId_oc();
            $id_producto = $dto->getId_producto();
            $cantidad = $dto->getCantidad();
            $sub_total = $dto->getSub_total();

            $stmt = $db->prepare("INSERT INTO detalle_oc (id_oc, id_producto, cantidad, sub_total) VALUES(?,?,?,?)");
            $stmt->bindParam(1, $id_oc);
            $stmt->bindParam(2, $id_producto);
            $stmt->bindParam(3, $cantidad);
            $stmt->bindParam(4, $sub_total);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }

    public static function eliminar($id_oc, $id_producto) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("DELETE FROM detalle_oc WHERE id_oc = ? and id_producto = ?");
            $stmt->bindParam(1, $id_oc);
            $stmt->bindParam(2, $id_producto);
            $respuesta = $stmt->execute();
        } catch (Exception $exc) {
            $respuesta = false;
        }
        return $respuesta;
    }

    public static function ver() {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_oc, id_producto, cantidad, sub_total FROM detalle_oc "
                    . " WHERE id_oc = ? and id_producto = ?");
            $stmt->bindParam(1, $id_oc);
            $stmt->bindParam(2, $id_producto);
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new DetalleOCModel();
                $dto->setId_oc($value["id_oc"]);
                $dto->setId_producto($value["id_producto"]);
                $dto->setCantidad($value["cantidad"]);
                $dto->setSub_total($value["sub_total"]);
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
            $id_oc = $dto->getId_oc();
            $id_producto = $dto->getId_producto();
            $cantidad = $dto->getCantidad();
            $sub_total = $dto->getSub_total();

            $stmt = $db->prepare("UPDATE detalle_oc SET cantidad = ? , sub_total = ? "
                    . " WHERE id_oc = ? and id_producto = ?");
            $stmt->bindParam(1, $cantidad);
            $stmt->bindParam(2, $sub_total);
            $stmt->bindParam(3, $id_oc);
            $stmt->bindParam(4, $id_producto);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }
}
