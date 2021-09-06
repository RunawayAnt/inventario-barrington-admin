<?php
    require '../../model/modelProduct.php';
    $model = new ModelProduct();
    $queryProduct = $model-> obtenerId();
    echo json_encode($queryProduct);
?>