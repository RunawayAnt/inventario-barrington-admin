<?php
require '../../model/modelSell.php';

$model = new ModelSell();

if ($_POST['action'] == 'infoProducto') {
    //print_r($_POST);
    //echo "Buscar cliente!";
    if (!empty($_POST['product'])) {
        $data = '';
        $codebar = htmlspecialchars($_POST['product'], ENT_QUOTES, 'UTF-8');
        $queryUser = $model->searchProduct($codebar);
        if ($queryUser > 0) {
            $data = $queryUser;
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
        }
        echo 'error!';
    exit;
    }
    
}