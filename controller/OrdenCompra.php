<?php

require_once '../config/ConexionDB.php';
require_once '../model/OrdenCompraModel.php';

class OrdenCompra {

    public function listar() {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_oc, fecha_emision, total_oc, estado, id_usuario FROM orden_compra");
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new OrdenCompraModel();
                $dto->setId_oc($value["id_oc"]);
                $dto->setFecha_emision($value["fecha_emision"]);
                $dto->setTotal_oc($value["total_oc"]);
                $dto->setEstado($value["estado"]);
                $dto->setId_usuario($value["id_usuario"]);
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
            $id_oc = $dto->getId_oc();
            $fecha_emision = $dto->getFecha_emision();
            $total_oc = $dto->total_oc();
            $estado = $dto->getEstado();
            $id_usuario = $dto->getId_usuario();
            
            $stmt = $db->prepare("INSERT INTO orden_compra (fecha_emision, total_oc, estado, id_usuario) VALUES(?,?,?,?)");
            $stmt->bindParam(1, $fecha_emision);
            $stmt->bindParam(2, $total_oc);
            $stmt->bindParam(3, $estado);
            $stmt->bindParam(4, $id_usuario);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }

    public function eliminar($id_oc) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("DELETE FROM orden_compra WHERE id_oc = ?");
            $stmt->bindParam(1, $id_oc);
            $respuesta = $stmt->execute();
        } catch (Exception $exc) {
            $respuesta = false;
        }
        return $respuesta;
    }

    public function ver($id_oc) {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_oc, fecha_emision, total_oc, estado, id_usuario FROM orden_compra WHERE id_oc = ?");
            $stmt->bindParam(1, $id_oc);
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new OrdenCompraModel();
                $dto->setId_oc($value["id_oc"]);
                $dto->setFecha_emision($value["fecha_emision"]);
                $dto->setTotal_oc($value["total_oc"]);
                $dto->setEstado($value["estado"]);
                $dto->setId_usuario($value["id_usuario"]);
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
            $id_oc = $dto->getId_oc();
            $fecha_emision = $dto->getFecha_emision();
            $total_oc = $dto->total_oc();
            $estado = $dto->getEstado();
            $id_usuario = $dto->getId_usuario();

            $stmt = $db->prepare("UPDATE orden_compra SET fecha_emision = ?, total_oc = ?, estado = ?, id_usuario = ?"
                    . " WHERE id_oc = ?");
            $stmt->bindParam(1, $fecha_emision);
            $stmt->bindParam(2, $total_oc);
            $stmt->bindParam(3, $estado);
            $stmt->bindParam(4, $id_usuario);
            $stmt->bindParam(5, $id_oc);
            return $stmt->execute();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return false;
    }
}

