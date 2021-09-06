<?php

require '../../../model/modelPerson.php';

$model = new ModelPerson();
$ctrlId = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$queryClient = $model->deleteClient($ctrlId);
echo $queryClient;
