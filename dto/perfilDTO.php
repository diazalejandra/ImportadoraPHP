<?php

include_once '../db/Conexion.php';

class perfilDTO implements JsonSerializable {

    private $id_perfil;
    private $descripcion_perfil;
    
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
            $sql = "SELECT id_perfil, descripcion_perfil FROM perfil";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function crear(){
            $sql2 = "SELECT id_perfil FROM perfil WHERE id_perfil = '{$this->id_perfil}";
            $resultado = $this->con->consultaRetorno($sql2);
            $num = mysql_num_rows($resultado);

            if($num != 0){
                return false;
            }else{
                $sql = "INSERT INTO perfil (id_perfil, descripcion_perfil) VALUES (
                    '{$this->id_perfil}', '{$this->descripcion_perfil}')";
                $this->con->consultaSimple($sql);
                return true;
            }
        }

        public function eliminar(){
            $sql = "DELETE FROM perfil WHERE id_perfil = '{$this->id_perfil}'";
            $this->con->consultaSimple($sql);
        }

        public function ver(){
            $sql = "SELECT id_perfil, descripcion_perfil FROM perfil WHERE id_perfil = '{$this->id_perfil}'";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);

            //Set
            $this->id_perfil= $row['id_perfil'];
            $this->descripcion_perfil = $row['descripcion_perfil'];        

            return $row;
        }

        public function editar(){
            $sql = "UPDATE perfil SET descripcion_perfil = '{$this->descripcion_perfil}' WHERE id_perfil = '{$this->id_perfil}'";
            $this->con->consultaSimple($sql);
        }
     

    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_perfil"] = $this->id_perfil_oc;
        $jsonArray["descripcion_perfil"] = $this->descripcion_perfil;

        return $jsonArray;
    }

}
