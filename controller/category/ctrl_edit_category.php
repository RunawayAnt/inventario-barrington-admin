<?php

require '../../model/modelCategory.php';

$model = new ModelCategory();

$ctrlId = htmlspecialchars($_POST['edit_id'], ENT_QUOTES, 'UTF-8');
$ctrlCategoria = htmlspecialchars($_POST['edit_categoria'], ENT_QUOTES, 'UTF-8');
$ctrlDescripcion = htmlspecialchars($_POST['edit_descripcion'], ENT_QUOTES, 'UTF-8');

$queryCategory = $model->editCategory($ctrlId,$ctrlCategoria,$ctrlDescripcion);
//$data = json_encode($queryUser);
echo $queryCategory;
