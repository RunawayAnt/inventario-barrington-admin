<?php
class ModelCategory
{
    private $conn;

    public function __construct()
    {
        require_once 'modelConn.php';
        $this->conn = new modelConn();
        $this->conn->Connect();
    }
    public function listCategory()
    {
        $sql = "call SP_LISTAR_CATEGORIAS()";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewCategory = mysqli_fetch_assoc($q)) {
                $query_array["data"][] = $query_viewCategory;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }
    public function registerCategory($categ, $descrip)
    {
        $sql = "call SP_REGISTRAR_CATEGORIAS('$categ','$descrip')";
        if ($q = $this->conn->conn->query($sql)) {
            if ($row = mysqli_fetch_array($q)) {
                return $id = trim($row[0]);
            }
            $this->conn->Disconnect();
        }
    }
    public function editCategory($edid, $edcateg, $eddescrip)
    {
        $sql = "call SP_EDITAR_CATEGORIAS('$edid','$edcateg','$eddescrip')";
        if ($q = $this->conn->conn->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function deleteCategory($idcateg)
    {
        $sql = "DELETE FROM `categorias` WHERE id_categoria = '$idcateg'";
        if ($q = $this->conn->conn->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function modifyEstatusCategory($id, $estatus)
    {
        $sql = "call SP_CAMBIAR_ESTADO_CATEGORIA('$id','$estatus')";
        if ($q = $this->conn->conn->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }
}
