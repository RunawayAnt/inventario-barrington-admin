<?php 

require '../../../model/modelPerson.php';

$model = new ModelPerson();

$ctrlId = htmlspecialchars($_POST['id_proveedor'], ENT_QUOTES, 'UTF-8');
$ctrlEstatus = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
$queryCategory = $model->modifyEstatusProvider($ctrlId, $ctrlEstatus);
echo $queryCategory;
