<?php
require '../../model/modelSell.php';

$model = new ModelSell();
$efectivo = $_POST['efectivo'];
$id_cl = $_POST['idcliente'];
$id_user = $_POST['idusuario'];
$tokken = md5($id_user);

$query_detalle_temp = $model->Sell($id_user,$id_cl,$tokken,$efectivo);
$data = $query_detalle_temp;
echo json_encode($data);
