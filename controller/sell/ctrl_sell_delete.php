<?php
require '../../model/modelSell.php';

$model = new ModelSell();

$id_prod = $_POST['id'];
$id_user = $_POST['user'];
$tokken = md5($id_user);
//echo $id_producto . $cantidad . $tokken; D23385827A
$query_iva = $model->selectIva();
$data_iva = $query_iva['iva'];

$query_detalle_temp = $model->deleteSelectProduct($tokken, $data_iva, $id_prod);
$data = $query_detalle_temp;
echo json_encode($data);
