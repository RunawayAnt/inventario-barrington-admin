<?php

require '../../model/modelProduct.php';

$model = new ModelProduct();

$ctrlId = htmlspecialchars($_POST['id_producto'], ENT_QUOTES, 'UTF-8');
$ctrlEstatus = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
$queryCategory = $model->modifyEstatusProduct($ctrlId, $ctrlEstatus);
echo $queryCategory;
