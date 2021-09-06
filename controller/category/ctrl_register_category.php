<?php

require '../../model/modelCategory.php';

$model = new ModelCategory();

$categoria = htmlspecialchars($_POST['rcategoria'], ENT_QUOTES, 'UTF-8');
$descripcion = htmlspecialchars($_POST['rdescripcion'], ENT_QUOTES, 'UTF-8');

$queryCategory = $model->registerCategory($categoria, $descripcion);
//$data = json_encode($queryUser);
echo $queryCategory;
