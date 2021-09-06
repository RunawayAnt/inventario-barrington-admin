<?php
require '../../model/modelSell.php';

$model = new ModelSell();

if (!empty($_POST['id_usuario'])) {
    //echo 'exito';
    $id = $_POST['id_usuario'];
    $tokken = md5($id);
//echo $id_producto . $cantidad . $tokken; D23385827A
    $query_iva = $model->selectIva();
    $data_iva = $query_iva['iva'];

    $query_detalle_temp = $model->addSelectTemp($tokken, $data_iva);
    $data = $query_detalle_temp;
    echo json_encode($data);
} else {
    echo 'error';
}
