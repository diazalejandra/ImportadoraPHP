<?php

include_once '../db/Conexion.php';

class productoDTO implements JsonSerializable {

    private $id_producto;
    private $descripcion;
    private $precio_unidad;
    private $id_tipo;
    
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
            $sql = "SELECT id_producto, descripcion, precio_unidad, id_tipo FROM producto";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function crear(){
            $sql2 = "SELECT id_producto FROM producto WHERE id_producto = {$this->id_producto}";
            $resultado = $this->con->consultaRetorno($sql2);
            $num = mysql_num_rows($resultado);

            if($num != 0){
                return false;
            }else{
                $sql = "INSERT INTO producto(descripcion, precio_unidad, id_tipo) VALUES (
                    '{$this->descripcion}', {$this->precio_unidad}, {$this->id_tipo})";
                $this->con->consultaSimple($sql);
                return true;
            }
        }

        public function eliminar(){
            $sql = "DELETE FROM producto WHERE id_producto = {$this->id_producto}";
            $this->con->consultaSimple($sql);
        }

        public function ver(){
            $sql = "SELECT id_producto, descripcion, precio_unidad, id_tipo FROM producto WHERE id_producto = {$this->id_producto}";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);

            //Set
            $this->id_producto= $row['id_producto'];
            $this->descripcion = $row['descripcion'];        
            $this->precio_unidad = $row['precio_unidad'];        
            $this->id_tipo = $row['id_tipo'];        

            return $row;
        }

        public function editar(){
            $sql = "UPDATE producto SET descripcion = '{$this->descripcion}', precio_unidad = {$this->precio_unidad}"
            . " WHERE id_producto = {$this->id_producto}";
            $this->con->consultaSimple($sql);
        }
     

    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_producto"] = $this->id_productooc;
        $jsonArray["descripcion"] = $this->descripcion;
        $jsonArray["precio_unidad"] = $this->precio_unidad;
        $jsonArray["id_tipo"] = $this->id_tipo;

        return $jsonArray;
    }

}
