<?php
class ModelUser
{
    private $conn;

    public function __construct()
    {
        require_once 'modelConn.php';
        $this->conn = new modelConn();
        $this->conn->Connect();
    }

    public function verifyUser($user, $pass)
    {
        $sql = "call SP_VERIFICAR_USUARIOS('$user')";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewUser = mysqli_fetch_array($q)) {
                if (password_verify($pass, $query_viewUser["contrasen"])) {
                    $query_array[] = $query_viewUser;
                }
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }
    public function listUser()
    {
        $sql = "call SP_LISTAR_USUARIOS()";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewUser = mysqli_fetch_assoc($q)) {
                $query_array["data"][] = $query_viewUser;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }
    public function listRol()
    {
        $sql = "call SP_LISTAR_ROL()";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewUser = mysqli_fetch_array($q)) {
                $query_array[] = $query_viewUser;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }
    public function registerUser($rol, $nombres, $apellidos, $dni, $usuario, $email, $telefono, $contrasen)
    {
        $sql = "call SP_REGISTRAR_USUARIOS('$rol','$nombres','$apellidos','$dni','$usuario','$email','$telefono','$contrasen')";
        if ($q = $this->conn->conn->query($sql)) {
            if ($row = mysqli_fetch_array($q)) {
                return $id = trim($row[0]);
            }
            $this->conn->Disconnect();
        }
    }
    public function modifyEstatusUser($id, $estatus)
    {
        $sql = "call SP_CAMBIAR_ESTADO('$id','$estatus')";
        if ($q = $this->conn->conn->query($sql)) {
            //$id_return = mysqli_insert_ind($this->conn->conn);
            return 1;
        } else {
            return 0;
        }
    }
    public function deleteUser($id)
    {
        $sql = "DELETE FROM `usuarios` WHERE id = '$id'";
        if ($q = $this->conn->conn->query($sql)) {
            //$id_return = mysqli_insert_ind($this->conn->conn);
            return 1;
        } else {
            return 0;
        }
    }
    public function editUser($id, $id_rol, $nombres, $apellidos, $dni, $usuario, $email, $telefono)
    {
        $sql = "call SP_EDITAR_USUARIOS('$id','$id_rol','$nombres','$apellidos','$dni','$usuario','$email','$telefono')";
        if ($q = $this->conn->conn->query($sql)) {
            //$id_return = mysqli_insert_ind($this->conn->conn);
            return 1;
        } else {
            return 0;
        }
    }
}
