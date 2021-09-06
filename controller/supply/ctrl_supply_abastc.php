<?php

require '../../model/modelSell.php';

$model = new ModelSell();

$idproducto = $_POST['idproducto'];
$cantid = $_POST['cantidad'];
$idproved = $_POST['idproveedor'];
$iduser = $_POST['idusuario'];
$total = $_POST['total'];
$efectiv = $_POST['efectivo'];

$queryProduct = $model->realizarAbastecimiento($idproducto, $cantid, $idproved, $iduser, $total, $efectiv);
//$data = json_encode($queryUser);
echo $queryProduct;
