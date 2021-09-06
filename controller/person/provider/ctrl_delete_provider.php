<?php

require '../../../model/modelPerson.php';

$model = new ModelPerson();
$ctrlId = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$queryProvider = $model->deleteProvider($ctrlId);
echo $queryProvider;
