<?php

require '../../model/modelCategory.php';

$model = new ModelCategory();

$ctrlId = htmlspecialchars($_POST['id_categoria'], ENT_QUOTES, 'UTF-8');
$ctrlEstatus = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
$queryCategory = $model->modifyEstatusCategory($ctrlId, $ctrlEstatus);
echo $queryCategory;
