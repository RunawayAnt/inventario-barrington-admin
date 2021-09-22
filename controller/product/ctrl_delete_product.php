<?php 
require '../../model/modelProduct.php';

$model = new ModelProduct();
$ctrlId = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$queryUser = $model->deleteProduct($ctrlId);
echo $queryUser;
?>