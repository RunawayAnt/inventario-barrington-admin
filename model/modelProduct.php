<?php
class ModelProduct
{
    private $conn;

    public function __construct()
    {
        require_once 'modelConn.php';
        $this->conn = new modelConn();
        $this->conn->Connect();
    }

    public function listProducts()
    {
        $sql = "call SP_LISTAR_PRODUCTOS()";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewClient = mysqli_fetch_assoc($q)) {
                $query_array["data"][] = $query_viewClient;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }
    
    public function listCategorySelect()
    {
        $sql = "call SP_PRODUCTO_CATEGORIA()";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewUser = mysqli_fetch_array($q)) {
                $query_array[] = $query_viewUser;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }

    public function listProviderSelect()
    {
        $sql = "call SP_PRODUCTO_PROVEEDOR()";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewUser = mysqli_fetch_array($q)) {
                $query_array[] = $query_viewUser;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }

    public function registerProduct($idprov, $codebar, $nombre, $descrip, $mininvent, $precEntr, $precioSalid, $unidad, $iduser, $idcategoria)
    {
        $sql = "call SP_REGISTRAR_PRODUCTO('$idprov','$codebar','$nombre','$descrip','$mininvent','$precEntr','$precioSalid','$unidad','$iduser','$idcategoria')";
        if ($q = $this->conn->conn->query($sql)) {
            if ($row = mysqli_fetch_array($q)) {
                return $id = trim($row[0]);
            }
            $this->conn->Disconnect();
        }
    }

    public function modifyEstatusProduct($id, $estatus)
    {
        $sql = "call SP_CAMBIAR_ESTADO_PRODUCTO('$id','$estatus')";
        if ($q = $this->conn->conn->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }
    // public function listProductsActive()
    // {
    //     $sql = "call SP_LISTAR_PRODUCTOS_ACTIVOS()";
    //     $query_array = array();
    //     if ($q = $this->conn->conn->query($sql)) {
    //         while ($query_viewClient = mysqli_fetch_assoc($q)) {
    //             $query_array["data"][] = $query_viewClient;
    //         }
    //         return $query_array;
    //         $this->conn->Disconnect();
    //     }
    // }

    public function editProduct($id, $nom, $desc, $prentrada, $prsalida, $mininv, $idcat, $idprov, $unid)
    {
        $sql = "call SP_EDITAR_PRODUCTOS('$id','$nom','$desc','$prentrada','$prsalida','$mininv','$idcat','$idprov','$unid')";
        if ($q = $this->conn->conn->query($sql)) {
            //$id_return = mysqli_insert_ind($this->conn->conn);
            return 1;
        } else {
            return 0;
        }
    }

    // public function deleteProduct($id)
    // {
    //     $sql = "DELETE FROM `producto` WHERE id_producto = '$id'";
    //     if ($q = $this->conn->conn->query($sql)) {
    //         //$id_return = mysqli_insert_ind($this->conn->conn);
    //         return 1;
    //     } else {
    //         return 0;
    //     }
    // }

    public function obtenerId()
    {
        $sql = "SELECT MAX(id_producto ) AS id_producto  FROM producto";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewUser = mysqli_fetch_array($q)) {
                $query_array[] = $query_viewUser;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }

    public function registerOperation($idproduct, $cantidad)
    {
        $sql = "call SP_REGISTRAR_OPERACION_PRODUCTO('$idproduct','$cantidad')";
        if ($q = $this->conn->conn->query($sql)) {
            return 1;
        } else {
            return 0;
        }
    }

    /*--------------------------------------------------
     public function codigo_aleatorio($letraP,$letraL,$longitud,$num){
        for ($i=1; $i <= $longitud ; $i++) {
        $numero = rand(0,9);
        $letraP.=$numero;
        }
        return $letraP.$num.$letraL;
    }
    --------------------------------------------------*/
}
