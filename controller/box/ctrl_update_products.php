<?php 
require '../../model/modelSell.php';

$model = new ModelSell();

$arrayproductos = $_POST['arr'];

$finalarrayproductos = array();
$asArr = explode( '|', $arrayproductos );
foreach( $asArr as $val ){
    $tmp = explode( ',', $val );
    $finalarrayproductos[ $tmp[0] ] = $tmp[1];
  }

$query_registroventa = $model->updateProductsSell($finalarrayproductos);
$data = $query_registroventa;
echo $sql;