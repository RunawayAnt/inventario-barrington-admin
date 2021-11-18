<?php
require '../../model/modelSell.php';

$model = new ModelSell();

    $idcliente = $_POST['idcliente'];
    $idvendedor = $_POST['idvendedor'];
    $total = $_POST['totalventa'];
    $tipopago = $_POST['tipopago'];

    $query_registroventa = $model->registerSell($idcliente, $idvendedor, $total, $tipopago);
    $data = $query_registroventa;
    echo json_encode($data);