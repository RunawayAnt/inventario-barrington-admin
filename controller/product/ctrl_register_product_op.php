<?php

require '../../model/modelProduct.php';

$model = new ModelProduct();

$idProveedor = htmlspecialchars($_POST['idprov'], ENT_QUOTES, 'UTF-8');
$codigoBarras = htmlspecialchars($_POST['codeb'], ENT_QUOTES, 'UTF-8');
$nombre = htmlspecialchars($_POST['nomb'], ENT_QUOTES, 'UTF-8');
$descripcion = htmlspecialchars($_POST['descrip'], ENT_QUOTES, 'UTF-8');
$minInventario = htmlspecialchars($_POST['mininv'], ENT_QUOTES, 'UTF-8');
$precioEntrada = htmlspecialchars($_POST['precentrada'], ENT_QUOTES, 'UTF-8');
$precioSalida = htmlspecialchars($_POST['precsalida'], ENT_QUOTES, 'UTF-8');
$unidad = htmlspecialchars($_POST['unid'], ENT_QUOTES, 'UTF-8');
$idUsuario = htmlspecialchars($_POST['idusuario'], ENT_QUOTES, 'UTF-8');
$idCategoria = htmlspecialchars($_POST['idcateg'], ENT_QUOTES, 'UTF-8');


$queryProduct = $model-> registerProduct($idProveedor,$codigoBarras,$nombre,$descripcion,$minInventario,$precioEntrada,$precioSalida,$unidad,$idUsuario,$idCategoria);
//$data = json_encode($queryUser);
echo $queryProduct;