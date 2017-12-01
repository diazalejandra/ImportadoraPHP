<?php

require_once '../config/ConexionDB.php';
require_once '../model/OrdenCompraModel.php';

class OrdenCompra {

    public static function listar() {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_oc, fecha_emision, total_oc, estado, id_usuario FROM orden_compra");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $lista = [];

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

    public static function crear($dto) {
        try {
            $db = new ConexionDB();
            $id_oc = $dto->getId_oc();
            $fecha_emision = $dto->getFecha_emision();
            $total_oc = $dto->getTotal_oc();
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

    public static function eliminar($id_oc) {
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

    public static function ver($id_oc) {
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

    public static function editar($dto) {
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
    
        public static function obtenerId() {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_oc FROM orden_compra limit 1");
            $stmt->execute();
            $resultado = $stmt->fetch();
            $dto = new OrdenCompraModel();
            $dto->setId_oc($resultado["id_oc"]);
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        return $dto->getId_oc();
    }
    
           public static function listarTop() {
        try {
            $pdo = new ConexionDB();
            $stmt = $pdo->prepare("SELECT id_oc, count(fecha_emision) as ventas, fecha_emision, total_oc, estado,"
                    . " id_usuario FROM orden_compra group by fecha_emision order by count(fecha_emision) desc");
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $lista = [];

            foreach ($resultado as $value) {
                $dto = new OrdenCompraModel();
                $dto->setId_oc($value["id_oc"]);
                $dto->setVentas($value["ventas"]);
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
}

