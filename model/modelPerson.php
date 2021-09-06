<?php
class ModelPerson
{
    private $conn;

    public function __construct()
    {
        require_once 'modelConn.php';
        $this->conn = new modelConn();
        $this->conn->Connect();
    }
//--------------------------------------------Cliente-------------------------------

    public function listClient()
    {
        $sql = "call SP_LISTAR_CLIENTES()";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewClient = mysqli_fetch_assoc($q)) {
                $query_array["data"][] = $query_viewClient;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }
    public function registerClient($nom, $ape, $dni, $telfA, $corr)
    {
        $sql = "call SP_REGISTRAR_CLIENTES('$nom','$ape','$dni','$telfA','$corr')";
        if ($q = $this->conn->conn->query($sql)) {
            if ($row = mysqli_fetch_array($q)) {
                return $id = trim($row[0]);
            }
            $this->conn->Disconnect();
        }
    }
    public function editClient($id, $nom, $ape, $dni, $telefono, $correo)
    {
        $sql = "call SP_EDITAR_CLIENTES('$id','$dni','$nom','$ape','$telefono','$correo')";
        if ($q = $this->conn->conn->query($sql)) {
            //$id_return = mysqli_insert_ind($this->conn->conn);
            return 1;
        } else {
            return 0;
        }
    }
    public function deleteClient($id)
    {
        $sql = "DELETE FROM `cliente` WHERE id = '$id'";
        if ($q = $this->conn->conn->query($sql)) {
            //$id_return = mysqli_insert_ind($this->conn->conn);
            return 1;
        } else {
            return 0;
        }
    }
//--------------------------------------------Proveedor-------------------------------
    public function listProvider()
    {
        $sql = "call SP_LISTAR_PROVEEDORES()";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewClient = mysqli_fetch_assoc($q)) {
                $query_array["data"][] = $query_viewClient;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }
    public function registerProvider($ruc, $nombre, $direccion, $email, $telf)
    {
        $sql = "call SP_REGISTRAR_PROVEEDOR('$ruc','$nombre','$direccion','$email','$telf')";
        if ($q = $this->conn->conn->query($sql)) {
            if ($row = mysqli_fetch_array($q)) {
                return $id = trim($row[0]);
            }
            $this->conn->Disconnect();
        }
    }
    public function modifyEstatusProvider($id, $estatus)
    {
        $sql = "call SP_CAMBIAR_ESTADO_PROVEEDOR('$id','$estatus')";
        if ($q = $this->conn->conn->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function editProvider($id, $ruc, $empresa, $direccion, $correo, $telefono)
    {
        $sql = "call SP_EDITAR_PROVEEDOR('$id','$ruc','$empresa','$direccion','$correo','$telefono')";
        if ($q = $this->conn->conn->query($sql)) {
            //$id_return = mysqli_insert_ind($this->conn->conn);
            return 1;
        } else {
            return 0;
        }
    }
    public function deleteProvider($id)
    {
        $sql = "DELETE FROM `proveedor` WHERE id = '$id'";
        if ($q = $this->conn->conn->query($sql)) {
            //$id_return = mysqli_insert_ind($this->conn->conn);
            return 1;
        } else {
            return 0;
        }
    }
}
