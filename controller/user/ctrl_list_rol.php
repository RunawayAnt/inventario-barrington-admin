<?php 

    require '../../model/modelUser.php';

    $model = new ModelUser();
    $queryUser = $model-> listRol();
    echo json_encode($queryUser);
?>