<?php
require '../../model/modelSell.php';

$model = new ModelSell();

// if ($_POST['action'] == 'addProductoDetalle') {

//     $id = $_POST['id_user'];
//     $cantidad = $_POST['cantidad'];
//     $id_producto = $_POST['product'];
//     $tokken = md5($id);
//     //echo $id_producto . $cantidad . $tokken; D23385827A
//     $query_iva = $model->selectIva();
//     $data_iva = $query_iva['iva'];

//     $query_detalle_temp = $model->addDetailTemp($id_producto, $cantidad, $tokken,$data_iva);
//     $data = $query_detalle_temp;
//     echo json_encode($data);

// }

