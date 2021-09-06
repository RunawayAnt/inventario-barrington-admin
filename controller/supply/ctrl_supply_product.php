<?php
require '../../model/modelSell.php';

$model = new ModelSell();

if ($_POST['action'] == 'searchProduct') {
    //print_r($_POST);
    //echo "Buscar cliente!";
    if (!empty($_POST['codebar'])) {
        $data = '';
        $codebar = htmlspecialchars($_POST['codebar'], ENT_QUOTES, 'UTF-8');
        $queryUser = $model->searchProductforCodeBar($codebar);
        if ($queryUser > 0) {
            $data = $queryUser;
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
        }
        echo 0;
    exit;
    }
    
}
