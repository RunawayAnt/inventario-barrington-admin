<?php 
    /*class Mdl_Usuario{
        private $conexion;

        function __construct(){
            require_once 'mdl_conexion.php';
            $this->conexion = new Conexion();
            $this->conexion->conectar();
        }

        function VerificarUsuario($usuario,$contra){
            $sql = "call SP_VERIFICAR_USUARIOS('$usuario')";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($sql)){
                while ($consulta_viewUsuario = mysqli_fetch_array($consulta)) {
                    if (password_verify($contra,$consulta_viewUsuario["contrasen"])) 
                    {
                        $arreglo[]=$consulta_viewUsuario;
                    }
                }
                return $arreglo;
                $this->conexion->desconectar();
            }
        }

    }
*/
?>