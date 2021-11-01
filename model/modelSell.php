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

//     public function searchClient($key)
//     {
//         $sql = "SELECT * FROM cliente where dni LIKE '$key'";
//         if ($q = $this->conn->conn->query($sql)) {
//             $query_viewUser = mysqli_fetch_assoc($q);
//             return $query_viewUser;
//             $this->conn->Disconnect();
//         }
//     }

//     public function listSell()
//     {
//         $sql = "call SP_LISTAR_VENTAS()";
//         $query_array = array();
//         if ($q = $this->conn->conn->query($sql)) {
//             while ($query_viewCategory = mysqli_fetch_assoc($q)) {
//                 $query_array["data"][] = $query_viewCategory;
//             }
//             return $query_array;
//             $this->conn->Disconnect();
//         }
//     }
//     public function listSubsell($idventa)
//     {
//         $sql = "call SP_LISTAR_DETALLEVENTAS('$idventa')";
//         $query_array = array();
//         if ($q = $this->conn->conn->query($sql)) {
//             while ($query_viewCategory = mysqli_fetch_assoc($q)) {
//                 $query_array["data"][] = $query_viewCategory;
//             }
//             return $query_array;
//             $this->conn->Disconnect();
//         }
//     }

//     public function mainDashboard()
//     {
//         $sql = "call SP_DASHBOARD_P()";
//         $query_array = array();
//         if ($q = $this->conn->conn->query($sql)) {
//             while ($query_viewUser = mysqli_fetch_array($q)) {
//                 $query_array[] = $query_viewUser;
//             }
//             return $query_array;
//             $this->conn->Disconnect();
//         }
//     }
//     public function mainDashboardDateNow()
//     {
//         $sql = "call SP_DASHBOARD_D()";
//         $query_array = array();
//         if ($q = $this->conn->conn->query($sql)) {
//             while ($query_viewUser = mysqli_fetch_array($q)) {
//                 $query_array[] = $query_viewUser;
//             }
//             return $query_array;
//             $this->conn->Disconnect();
//         }
//     }
//    /* public function listProductsNow()
//     {
//         $sql = "call SP_LISTAR_PRODUCTOS_ACTIVOS()";
//         $query_array = array();
//         if ($q = $this->conn->conn->query($sql)) {
//             while ($query_viewClient = mysqli_fetch_assoc($q)) {
//                 $query_array["data"][] = $query_viewClient;
//             }
//             return $query_array;
//             $this->conn->Disconnect();
//         }
//     }
//     public function listProductsActive()
//     {
//         $sql = "call SP_LISTAR_PRODUCTOS_ACTIVOS()";
//         $query_array = array();
//         if ($q = $this->conn->conn->query($sql)) {
//             while ($query_viewClient = mysqli_fetch_assoc($q)) {
//                 $query_array["data"][] = $query_viewClient;
//             }
//             return $query_array;
//             $this->conn->Disconnect();
//         }
//     }
// */
//     public function searchProduct($codebar)
//     {
//         $sql = "SELECT producto.nombre, producto.preciosalida, producto.mininventario, producto.id_producto, operacion.cantidad FROM operacion INNER JOIN producto ON operacion.id_producto = producto.id_producto WHERE codigobarras LIKE '$codebar' AND estado = 'Activo'";
//         if ($q = $this->conn->conn->query($sql)) {
//             $query_viewUser = mysqli_fetch_assoc($q);
//             return $query_viewUser;
//             $this->conn->Disconnect();
//         }
//     }
//     public function searchProductforCodeBar($codebar)
//     {
//         $sql = "SELECT producto.nombre, producto.precioentrada, producto.unidad, producto.id_producto,(categorias.nombre)categoria,proveedor.ruc,proveedor.razonsocial,proveedor.direccion,proveedor.telefono,proveedor.correo,(proveedor.id)id_proveedor, operacion.cantidad FROM operacion INNER JOIN producto ON operacion.id_producto = producto.id_producto INNER JOIN categorias ON producto.id_categoria=categorias.id_categoria INNER JOIN proveedor ON producto.id_proveedor=proveedor.id WHERE codigobarras LIKE '$codebar' AND id_tipo_operacion = 1 AND producto.estado = 'Activo' ";
//         if ($q = $this->conn->conn->query($sql)) {
//             $query_viewUser = mysqli_fetch_assoc($q);
//             return $query_viewUser;
//             $this->conn->Disconnect();
//         }
//     }



//     public function selectIva()
//     {
//         $sql = "SELECT iva FROM configuracion";
//         if ($q = $this->conn->conn->query($sql)) {
//             $query_viewUser = mysqli_fetch_assoc($q);
//             return $query_viewUser;
//             $this->conn->Disconnect();
//         }
//     }

//     public function addSelectTemp($in_tokken, $d_iva)
//     {
//         $sql = "SELECT detalle_temp.id_detallet,detalle_temp.token_user,detalle_temp.cantidad,detalle_temp.precio_venta,detalle_temp.id_product,producto.nombre FROM detalle_temp INNER JOIN producto ON detalle_temp.id_product = producto.id_producto WHERE token_user = '$in_tokken'";
//         $query_array = array();
//         $detailTable = '';
//         $sub_total = 0;
//         $total = 0;
//         $precioTotal = 0;
//         if ($q = $this->conn->conn->query($sql)) {

//             while ($query_viewUser = mysqli_fetch_array($q)) {
//                 $precioTotal = round($query_viewUser['cantidad'] * $query_viewUser['precio_venta'], 2);
//                 $sub_total = round($sub_total + $precioTotal, 2);
//                 $total = round($total + $precioTotal, 2);

//                 $detailTable .= '<tr>
//                                     <td>' . $query_viewUser['id_product'] . '</td>
//                                     <td>' . $query_viewUser['nombre'] . '</td>
//                                     <td>' . $query_viewUser['cantidad'] . '</td>
//                                     <td>' . $query_viewUser['precio_venta'] . '</td>
//                                     <td>' . $precioTotal . '</td>
//                                     <td><button  class="borrar btn btn-danger btn-sm" href="#" onclick="event.preventDefault(); obtenerProductoId(' . $query_viewUser['id_detallet'] . ')"><i class="fas fa-trash"></i></button></td>
//                                 </tr>';
//             }
//             $impuesto = round($sub_total * ($d_iva / 100), 2);
//             $tl_sniva = round($sub_total - $impuesto, 2);
//             $total = round($tl_sniva + $impuesto, 2);
//             $detailTotal = ' <tr>
//                                 <th style="width:50%">Subtotal:</th>
//                                 <td> s/ ' . $tl_sniva . '</td>
//                             </tr>
//                             <tr>
//                                 <th>IVA (' . $d_iva . '%)</th>
//                                 <td> s/ ' . $impuesto . '</td>
//                             </tr>
//                             <tr>
//                                 <th>Total:</th>
//                                 <td> s/ ' . $total . '</td>
//                             </tr>';

//             if ($total > 0) {
//                 $query_array['detalle'] = $detailTable;
//                 $query_array['total'] = $detailTotal;
//                 $query_array['precioTotal'] = $total;
//             } else {
//                 $query_array['detalle'] = 0;
//                 $query_array['total'] = 0;
//                 $query_array['precioTotal'] = 0;
//             }

//             return $query_array;
//             $this->conn->Disconnect();
//         }
//     }

//     public function deleteSelectProduct($in_tokken, $d_iva, $id_prod_detalle)
//     {
//         $sql = "call SP_ELIMINAR_DETALLE_TEMP('$id_prod_detalle','$in_tokken')";
//         $query_array = array();
//         $detailTable = '';
//         $sub_total = 0;
//         $total = 0;
//         $precioTotal = 0;
//         if ($q = $this->conn->conn->query($sql)) {

//             while ($query_viewUser = mysqli_fetch_array($q)) {
//                 $precioTotal = round($query_viewUser['cantidad'] * $query_viewUser['precio_venta'], 2);
//                 $sub_total = round($sub_total + $precioTotal, 2);
//                 $total = round($total + $precioTotal, 2);

//                 $detailTable .= '<tr>
//                                     <td>' . $query_viewUser['id_product'] . '</td>
//                                     <td>' . $query_viewUser['nombre'] . '</td>
//                                     <td>' . $query_viewUser['cantidad'] . '</td>
//                                     <td>' . $query_viewUser['precio_venta'] . '</td>
//                                     <td>' . $precioTotal . '</td>
//                                     <td><button  class="borrar btn btn-danger btn-sm" href="#" onclick="event.preventDefault(); obtenerProductoId(' . $query_viewUser['id_detallet'] . ')"><i class="fas fa-trash"></i></button></td>
//                                 </tr>';
//             }
//             $impuesto = round($sub_total * ($d_iva / 100), 2);
//             $tl_sniva = round($sub_total - $impuesto, 2);
//             $total = round($tl_sniva + $impuesto, 2);
//             $detailTotal = ' <tr>
//                                 <th style="width:50%">Subtotal:</th>
//                                 <td> s/ ' . $tl_sniva . '</td>
//                             </tr>
//                             <tr>
//                                 <th>IVA (' . $d_iva . '%)</th>
//                                 <td> s/ ' . $impuesto . '</td>
//                             </tr>
//                             <tr>
//                                 <th>Total:</th>
//                                 <td> s/ ' . $total . '</td>
//                             </tr>';

//             $query_array['detalle'] = $detailTable;
//             $query_array['total'] = $detailTotal;
//             $query_array['precioTotal'] = $total;

//             return $query_array;
//             $this->conn->Disconnect();
//         }
//     }
//     public function destroySell($in_tokken)
//     {
//         $sql = "DELETE FROM `detalle_temp` WHERE token_user = '$in_tokken'";
//         if ($q = $this->conn->conn->query($sql)) {
//             //$id_return = mysqli_insert_ind($this->conn->conn);
//             return 1;
//         } else {
//             return 0;
//         }
//     }

//     public function Sell($cod_usuario,$cod_cliente,$tokken,$cl_efectivo)
//     {
//         $sql = "call SP_PROCESAR_VENTA('$cod_usuario','$cod_cliente','$tokken','$cl_efectivo')";
//         if ($q = $this->conn->conn->query($sql)) {
//             //$id_return = mysqli_insert_ind($this->conn->conn);
//             $query_viewUser = mysqli_fetch_assoc($q);
//             return $query_viewUser;
//             $this->conn->Disconnect();
//         }
//     }
//     public function addDetailTemp($in_idproducto, $in_cantidad, $in_tokken, $d_iva)
//     {
//         $sql = "call SP_AGREGAR_DETALLE_TEMP('$in_idproducto','$in_cantidad','$in_tokken')";
//         $query_array = array();
//         $detailTable = '';
//         $sub_total = 0;
//         $total = 0;
//         $precioTotal = 0;
//         if ($q = $this->conn->conn->query($sql)) {
//             while ($query_viewUser = mysqli_fetch_array($q)) {
//                 $precioTotal = round($query_viewUser['cantidad'] * $query_viewUser['precio_venta'], 2);
//                 $sub_total = round($sub_total + $precioTotal, 2);
//                 $total = round($total + $precioTotal, 2);

//                 $detailTable .= '<tr>
//                                     <td>' . $query_viewUser['id_product'] . '</td>
//                                     <td>' . $query_viewUser['nombre'] . '</td>
//                                     <td>' . $query_viewUser['cantidad'] . '</td>
//                                     <td>' . $query_viewUser['precio_venta'] . '</td>
//                                     <td>' . $precioTotal . '</td>
//                                     <td><button  class="borrar btn btn-danger btn-sm" href="#" onclick="event.preventDefault(); obtenerProductoId(' . $query_viewUser['id_detallet'] . ')"><i class="fas fa-trash"></i></button></td>
//                                 </tr>';
//             }
//             $impuesto = round($sub_total * ($d_iva / 100), 2);
//             $tl_sniva = round($sub_total - $impuesto, 2);
//             $total = round($tl_sniva + $impuesto, 2);
//             $detailTotal = ' <tr>
//                                 <th style="width:50%">Subtotal:</th>
//                                 <td> s/ ' . $tl_sniva . '</td>
//                             </tr>
//                             <tr>
//                                 <th>IVA (' . $d_iva . '%)</th>
//                                 <td> s/ ' . $impuesto . '</td>
//                             </tr>
//                             <tr>
//                                 <th>Total:</th>
//                                 <td> s/ ' . $total . '</td>
//                             </tr>';
//             $query_array['detalle'] = $detailTable;
//             $query_array['total'] = $detailTotal;
//             $query_array['precioTotal'] = $total;
//             return $query_array;
//             $this->conn->Disconnect();
//         }
//     }
// //---------------------------------------------Abastecer---------------------------call sp_procesar_abastecimiento


// public function realizarAbastecimiento($idproducto,$cantidad,$idproveedor,$idusuario,$total,$efectivo)
// {
//     $sql = "call SP_PROCESAR_ABASTECIMIENTO('$idproducto','$cantidad','$idproveedor','$idusuario','$total','$efectivo')";
//     if ($q = $this->conn->conn->query($sql)) {
//         return 1;
//     } else {
//         return 0;
//     }
// }


// public function listSupply()
// {
//     $sql = "call SP_LISTAR_ABASTECIMIENTOS()";
//     $query_array = array();
//     if ($q = $this->conn->conn->query($sql)) {
//         while ($query_viewCategory = mysqli_fetch_assoc($q)) {
//             $query_array["data"][] = $query_viewCategory;
//         }
//         return $query_array;
//         $this->conn->Disconnect();
//     }
// }
// public function listSubsupply($idventa)
// {
//     $sql = "call SP_LISTAR_DETALLEABASTECIMIENTO('$idventa')";
//     $query_array = array();
//     if ($q = $this->conn->conn->query($sql)) {
//         while ($query_viewCategory = mysqli_fetch_assoc($q)) {
//             $query_array["data"][] = $query_viewCategory;
//         }
//         return $query_array;
//         $this->conn->Disconnect();
//     }
// }



}

//