<?php

include_once '../db/Conexion.php';

class ordenCompraDTO implements JsonSerializable{
    private $id_oc;
    private $fecha_emision;
    private $total_oc;
    private $estado;
    private $id_usuario;
    
    private $con;
    
    function __construct() {
        $this->con = new Conexion();
    }
    
        public function set($atributo, $contenido){
            $this->$atributo = $contenido;
        }

        public function get($atributo){
            return $this->$atributo;
        }

        public function listar(){
            $sql = "SELECT id_oc, fecha_emision, total_oc, estado, id_usuario FROM orden_compra";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function crear(){

            $sql2 = "SELECT id_oc FROM orden_compra WHERE id_oc = {$this->id_oc}";
            $resultado = $this->con->consultaRetorno($sql2);
            $num = mysql_num_rows($resultado);

            if($num != 0){
                return false;
            }else{
                $sql = "INSERT INTO orden_compra (fecha_emision, total_oc, estado, id_usuario) VALUES ("
                        . "'{$this->fecha_emision}', {$this->total_oc}, '{$this->estado}', {$this->id_usuario})";
                $this->con->consultaSimple($sql);
                return true;
            }
        }

        public function eliminar(){
            $sql = "DELETE FROM orden_compra WHERE id_oc = {$this->id_oc}";
            $this->con->consultaSimple($sql);
        }

        public function ver(){
            $sql = "SELECT id_oc, fecha_emision, total_oc, estado, id_usuario"
                    . " FROM orden_compra"
                    . " WHERE id_oc = {$this->id_oc}";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);

            //Set
            $this->id_oc= $row['id_oc'];
            $this->fecha_emision = $row['fecha_emision'];
            $this->total_oc = $row['total_oc'];
            $this->estado = $row['estado'];         
            $this->id_usuario = $row['id_usuario'];         

            return $row;
        }

        public function editar(){
            $sql = "UPDATE orden_compra SET fecha_emision = '{$this->fecha_emision}', total_oc = {$this->total_oc},"
            . " estado = '{$this->estado}', id_usuario = {$this->id_usuario}"
            . " WHERE id_oc = {$this->id_oc}";
            $this->con->consultaSimple($sql);
        }

    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_oc"] = $this->id_oc;
        $jsonArray["fecha_emision"] = $this->fecha_emision;
        $jsonArray["total_oc"] = $this->total_oc;
        $jsonArray["estado"] = $this->estado;
        $jsonArray["id_usuario"] = $this->id_usuario;

        return $jsonArray;    
    }

}
