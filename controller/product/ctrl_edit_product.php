<?php

require '../../model/modelProduct.php';

$model = new ModelProduct();

$id = htmlspecialchars($_POST['edit_id'], ENT_QUOTES, 'UTF-8');
$nom = htmlspecialchars($_POST['edit_nom'], ENT_QUOTES, 'UTF-8');
$descrip = htmlspecialchars($_POST['edit_descrip'], ENT_QUOTES, 'UTF-8');
$preentrada = htmlspecialchars($_POST['edit_prentrada'], ENT_QUOTES, 'UTF-8');
$presalida = htmlspecialchars($_POST['edit_prsalida'], ENT_QUOTES, 'UTF-8');
$mininv = htmlspecialchars($_POST['edit_mininv'], ENT_QUOTES, 'UTF-8');
$idcategoria = htmlspecialchars($_POST['edit_categ'], ENT_QUOTES, 'UTF-8');
$idproveedor = htmlspecialchars($_POST['edit_prov'], ENT_QUOTES, 'UTF-8');
$unidad = htmlspecialchars($_POST['edit_unid'], ENT_QUOTES, 'UTF-8');

$queryUser = $model->editProduct($id,$nom,$descrip,$preentrada,$presalida,$mininv,$idcategoria,$idproveedor,$unidad);
$data = json_encode($queryUser);
echo $queryUser;
