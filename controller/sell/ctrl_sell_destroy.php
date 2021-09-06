<?php
require '../../model/modelSell.php';

$model = new ModelSell();

$id_user = $_POST['user'];
$tokken = md5($id_user);

$query_detalle_temp = $model->destroySell($tokken);
$data = $query_detalle_temp;
echo json_encode($data);
