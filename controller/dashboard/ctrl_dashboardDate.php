<?php 

    require '../../model/modelSell.php';

    $model = new ModelSell();
    $queryCategory = $model-> mainDashboardDateNow();
    echo json_encode($queryCategory);
?>