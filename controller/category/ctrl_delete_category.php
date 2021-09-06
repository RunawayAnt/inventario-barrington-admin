<?php

require '../../model/modelCategory.php';

$model = new ModelCategory();

$ctrlId = htmlspecialchars($_POST['idcategoria'], ENT_QUOTES, 'UTF-8');
$queryCategory = $model->deleteCategory($ctrlId);
echo $queryCategory;

?>