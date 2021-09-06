<?php 
require '../../model/modelUser.php';

$model = new ModelUser();
$ctrlId = htmlspecialchars($_POST['idusuario'], ENT_QUOTES, 'UTF-8');
$queryUser = $model->deleteUser($ctrlId);
echo $queryUser;

?>