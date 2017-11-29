<?php
include_once '../db/conexion.php';
include_once '../dto/detalleocDTO.php';

class detalleocDAO implements genericDAO {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function actualizar($registro) {
        
    }

    public function agregar($registro) {
         try
        {
            $db = new ConexionDB();
            $id_oc = $registro->getId_oc();

            
            
            $paciente = $dto->getId_paciente();
            /* @var $profesional type */
            $profesional = $dto->getId_profesional();
            /* @var $fecha type */
            $fecha = $dto->getFecha();
            /* @var $hora type */
            $hora = $dto->getHora();
             
            $stmt = $db->prepare("INSERT INTO RESERVA VALUES(?,?,?,?)");
            $stmt->bindParam(1, $paciente);
            $stmt->bindParam(2, $profesional);
            $stmt->bindParam(3, $fecha);
            $stmt->bindParam(4, $hora);
            return $stmt->execute();
            
        } catch (Exception $ex) {
            echo "Error SQL al agregar ". $ex->getMessage();
        }
        return false;        
    }

    public function eliminar($idRegistro) {
        
    }

    public function listarTodos() {
        
    }

}
