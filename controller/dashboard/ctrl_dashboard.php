<?php 

    require '../../model/modelSell.php';

    $model = new ModelSell();
    $queryCategory = $model-> mainDashboard();
    echo json_encode($queryCategory);
?>