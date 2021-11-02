<?php 
require '../../model/modelSell.php';

$model = new ModelSell();

$sql = $_POST['sql'];
$query_registroventa = $model->registerProductsSell($sql);
$data = $query_registroventa;
echo $data;