<?php
class ModelSell
{
    private $conn;

    public function __construct()
    {
        require_once 'modelConn.php';
        $this->conn = new modelConn();
        $this->conn->Connect();
    }

    public function registerSell($idcliente, $idvendedor, $total, $tipopago)
    {
        $sql = "call SP_REGISTRAR_VENTAS($idcliente,$idvendedor,$total,'$tipopago')";
        if ($q = $this->conn->conn->query($sql)) {
            if ($row = mysqli_fetch_array($q)) {
                return $id = trim($row[0]);
            }
            $this->conn->Disconnect();
        }
    }

    public function listSell()
    {
        $sql = "call SP_LISTAR_VENTAS()";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewCategory = mysqli_fetch_assoc($q)) {
                $query_array["data"][] = $query_viewCategory;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }

    public function listSellp()
    {
        $sql = "call SP_LISTAR_VENTAS_PAGADAS()";
        $query_array = array();
        if ($q = $this->conn->conn->query($sql)) {
            while ($query_viewCategory = mysqli_fetch_assoc($q)) {
                $query_array["data"][] = $query_viewCategory;
            }
            return $query_array;
            $this->conn->Disconnect();
        }
    }

    public function registerProductsSell($valuesql)
    {
        $sql = "INSERT INTO `operacion`(`id_producto`,`cantidad`, `id_tipo_operacion`, `id_venta`, `creacion`)".$valuesql;

        if ($q = $this->conn->conn->query($sql)) {
            if ($row = mysqli_fetch_array($q)) {
                return $id = trim($row[0]);
            }
            $this->conn->Disconnect();
        }
    }
    // $idventa
    public function updateProductsSell($array_ids)
    {
        $ids = implode(',', array_keys($array_ids)); 
        $sql = "UPDATE operacion SET cantidad = CASE id_producto "; 
        foreach ($array_ids as $id => $valor) {
            $sql .= sprintf("WHEN %d THEN %d ", $id, $valor);
        }
        $sql .= "END WHERE id_producto IN ($ids) AND id_venta IS NULL";  

        if ($q = $this->conn->conn->query($sql)) {
            if ($row = mysqli_fetch_array($q)) {
                return $id = trim($row[0]);
            }
            $this->conn->Disconnect();
        }
    }

    public function sellProducto($idventa)
    {
        $sql = "call SP_PAGAR_VENTA($idventa, 'Pagado');";
        if ($q = $this->conn->conn->query($sql)) {
            if ($row = mysqli_fetch_array($q)) {
                return $id = trim($row[0]);
            }
            $this->conn->Disconnect();
        }
    }

}