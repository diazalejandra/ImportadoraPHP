<?php

include_once '../db/Conexion.php';

class usuarioDTO implements JsonSerializable {

    private $id_usuario;
    private $login_usuario;
    private $pass_usuario;
    private $nombre_usuario;
    private $apellido_usuario;
    private $correo_usuario;
    private $edad_usuario;
    private $codigo_perfil;
    private $fechaNacimiento_usuario;
    
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
            $sql = "SELECT id_usuario, login_usuario, pass_usuario, nombre_usuario, apellido_usuario, correo_usuario,"
                    . " edad_usuario, codigo_perfil, fechaNacimiento_usuario FROM usuario";
            $resultado = $this->con->consultaRetorno($sql);
            return $resultado;
        }

        public function crear(){

            $sql2 = "SELECT id_usuario FROM usuario WHERE id_usuario = {$this->id_usuario}";
            $resultado = $this->con->consultaRetorno($sql2);
            $num = mysql_num_rows($resultado);

            if($num != 0){
                return false;
            }else{
                $sql = "INSERT INTO usuario (login_usuario, pass_usuario, nombre_usuario, apellido_usuario, correo_usuario,"
                        . " edad_usuario, codigo_perfil, fechaNacimiento_usuario) VALUES ("
                        . "'{$this->login_usuario}', '{$this->pass_usuario}', '{$this->nombre_usuario}', '{$this->apellido_usuario}', "
                        . "'{$this->correo_usuario}', {$this->edad_usuario}, '{$this->codigo_perfil}', '{$this->fechaNacimiento_usuario}')";
                $this->con->consultaSimple($sql);
                return true;
            }
        }

        public function eliminar(){
            $sql = "DELETE FROM usuario WHERE id_usuario = {$this->id_usuario}";
            $this->con->consultaSimple($sql);
        }

        public function ver(){
            $sql = "SELECT id_usuario, login_usuario, pass_usuario, nombre_usuario, apellido_usuario, correo_usuario,"
                    . " edad_usuario, codigo_perfil, fechaNacimiento_usuario"
                    . " FROM usuario"
                    . " WHERE id_usuario = {$this->id_usuario}";
            $resultado = $this->con->consultaRetorno($sql);
            $row = mysql_fetch_assoc($resultado);

            //Set
            $this->id_usuario= $row['id_usuario'];
            $this->login_usuario = $row['login_usuario'];
            $this->pass_usuario = $row['pass_usuario'];
            $this->nombre_usuario = $row['nombre_usuario'];
            $this->apellido_usuario = $row['apellido_usuario'];
            $this->correo_usuario = $row['correo_usuario'];
            $this->edad_usuario = $row['edad_usuario'];
            $this->codigo_perfil = $row['codigo_perfil'];
            $this->fechaNacimiento_usuario = $row['fechaNacimiento_usuario'];
     
            return $row;
        }

        public function editar(){
            $sql = "UPDATE usuario SET login_usuario = '{$this->login_usuario}', pass_usuario = '{$this->pass_usuario}',"
            . " nombre_usuario = '{$this->nombre_usuario}', apellido_usuario = '{$this->apellido_usuario}',"
            . " correo_usuario = '{$this->correo_usuario}', edad_usuario = {$this->edad_usuario}, codigo_perfil = '{$this->codigo_perfil}',"
            . " fechaNacimiento_usuario = '{$this->fechaNacimiento_usuario}'"
            . " WHERE id_usuario = {$this->id_usuario}";
            $this->con->consultaSimple($sql);
        }

    public function jsonSerialize() {
        $jsonArray = array();

        $jsonArray["id_usuario"] = $this->id_usuario;
        $jsonArray["login_usuario"] = $this->login_usuario;
        $jsonArray["pass_usuario"] = $this->pass_usuario;
        $jsonArray["nombre_usuario"] = $this->nombre_usuario;
        $jsonArray["apellido_usuario"] = $this->apellido_usuario;
        $jsonArray["correo_usuario"] = $this->correo_usuario;
        $jsonArray["edad_usuario"] = $this->edad_usuario;
        $jsonArray["codigo_perfil"] = $this->codigo_perfil;
        $jsonArray["fechaNacimiento_usuario"] = $this->fechaNacimiento_usuario;

        return $jsonArray;     
    }
}
?>

