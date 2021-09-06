<?php

require '../../model/modelProduct.php';

$model = new ModelProduct();

$idProduct = htmlspecialchars($_POST['idprod'], ENT_QUOTES, 'UTF-8');
$cantidad = htmlspecialchars($_POST['cantid'], ENT_QUOTES, 'UTF-8');

$queryProduct = $model-> registerOperation($idProduct,$cantidad);
//$data = json_encode($queryUser);
echo $queryProduct;