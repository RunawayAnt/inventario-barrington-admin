<?php
    require '../../model/modelProduct.php';
    $model = new ModelProduct();
    $queryProduct = $model-> listCategorySelect();
    echo json_encode($queryProduct);
?>