<?php
    require '../../model/modelProduct.php';
    $model = new ModelProduct();
    $queryProduct = $model-> listProviderSelect();
    echo json_encode($queryProduct);
?>