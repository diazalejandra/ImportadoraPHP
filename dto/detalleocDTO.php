<?php

include_once '../db/Conexion.php';

class detalleocDTO implements JsonSerializable {

    private $id_oc;
    private $id_producto;
    private $cantidad;
    private $sub_total;
    
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
            $sql = "SELECT id_oc, id_producto, cantidad, sub_total FROM detalle_oc";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function crear(){

            $sql2 = "SELECT id_oc FROM detalle_oc WHERE id_oc = {$this->id_oc} and id_producto = ($this->id_producto)";
            $resultado = $this->con->consultaRetorno($sql2);
            $num = mysql_num_rows($resultado);

            if($num != 0){
                return false;
            }else{
                $sql = "INSERT INTO detalle_oc (id_oc, id_producto, cantidad, sub_total) VALUES (
                    {$this->id_oc}, {$this->id_producto}, {$this->cantidad}, {$this->sub_total})";
                $this->con->consultaSimple($sql);
                return true;
            }
        }

        public function eliminar(){
            $sql = "DELETE FROM detalle_oc WHERE id_oc = {$this->id_oc} and id_producto = ($this->id_producto)";
            $this->con->consultaSimple($sql);
        }

        public function ver(){
            $sql = "SELECT id_oc, id_producto, cantidad, sub_total"
                    . " FROM detalle_oc"
                    . " WHERE id_oc = {$this->id_oc} and id_producto = ($this->id_producto)";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);

            //Set
            $this->id_oc= $row['id_oc'];
            $this->id_producto = $row['id_producto'];
            $this->cantidad = $row['cantidad'];
            $this->sub_total = $row['sub_total'];         

            return $row;
        }

        public function editar(){
            $sql = "UPDATE detalle_oc SET cantidad = '{$this->cantidad}', sub_total = '{$this->sub_total}' WHERE id_oc = '{$this->id_oc}' and id_producto = '($this->id_producto)'";
            $this->con->consultaSimple($sql);
        }
        
    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_oc"] = $this->id_oc;
        $jsonArray["id_producto"] = $this->id_producto;
        $jsonArray["cantidad"] = $this->cantidad;
        $jsonArray["sub_total"] = $this->sub_total;

        return $jsonArray;
    }

}
