<?php 

    require '../../model/modelUser.php';

    $model = new ModelUser();
    $ctrlUser = htmlspecialchars($_POST['usu'],ENT_QUOTES,'UTF-8');
    $ctrlPass = htmlspecialchars($_POST['cot'],ENT_QUOTES,'UTF-8');
    $queryUser = $model-> verifyUser($ctrlUser,$ctrlPass);
    $data = json_encode($queryUser);
    if (count($queryUser)>0) {
        echo $data;
    }else {
        echo 0;
    }

?>