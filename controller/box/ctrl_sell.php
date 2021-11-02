<?php 
require '../../model/modelSell.php';

$model = new ModelSell();

$id = $_POST['idventa'];
$query_registroventa = $model->sellProducto($id);
$data = $query_registroventa;
echo $data;