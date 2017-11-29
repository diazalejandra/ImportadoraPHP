<?php

include_once '../db/Conexion.php';

class tipoProductoDTO implements JsonSerializable {
    private $id_tipoproducto;
    private $descripcion_tipo;
    
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
            $sql = "SELECT id_tipoproducto, descripcion_tipo FROM tipo_producto";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function crear(){

            $sql2 = "SELECT id_tipoproducto FROM tipo_producto WHERE id_tipoproducto = {$this->id_tipoproducto}";
            $resultado = $this->con->consultaRetorno($sql2);
            $num = mysql_num_rows($resultado);

            if($num != 0){
                return false;
            }else{
                $sql = "INSERT INTO tipo_producto (descripcion_tipo) VALUES ('{$this->descripcion_tipo}')";
                $this->con->consultaSimple($sql);
                return true;
            }
        }

        public function eliminar(){
            $sql = "DELETE FROM tipo_producto WHERE id_tipoproducto = {$this->id_tipoproducto}";
            $this->con->consultaSimple($sql);
        }

        public function ver(){
            $sql = "SELECT id_tipoproducto, descripcion_tipo FROM tipo_producto WHERE id_tipoproducto = {$this->id_tipoproducto}";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);

            //Set
            $this->id_tipoproducto= $row['id_tipoproducto'];
            $this->descripcion_tipo = $row['descripcion_tipo'];
     
            return $row;
        }

        public function editar(){
            $sql = "UPDATE tipo_producto SET descripcion_tipo = '{$this->descripcion_tipo}' WHERE id_tipoproducto = {$this->id_tipoproducto}";
            $this->con->consultaSimple($sql);
        }

        
    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_tipoproducto"] = $this->id_tipoproducto;
        $jsonArray["descripcion_tipo"] = $this->descripcion_tipo;

        return $jsonArray;
    }
}
