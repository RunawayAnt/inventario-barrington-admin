<?php

require '../../model/modelUser.php';

$model = new ModelUser();
$ctrlId = htmlspecialchars($_POST['idusuario'], ENT_QUOTES, 'UTF-8');
$ctrlEstatus = htmlspecialchars($_POST['estado'], ENT_QUOTES, 'UTF-8');
$queryUser = $model->modifyEstatusUser($ctrlId, $ctrlEstatus);
echo $queryUser;
