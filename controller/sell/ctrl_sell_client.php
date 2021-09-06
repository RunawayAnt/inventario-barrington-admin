<?php 
require '../../model/modelSell.php';

$model = new ModelSell();

if ($_POST['action']=='searchCliente') {
        //print_r($_POST);
         //echo "Buscar cliente!";
         if (!empty($_POST['cliente'])) {
                $data ='';
                $dni = htmlspecialchars($_POST['cliente'], ENT_QUOTES, 'UTF-8');
                $queryUser = $model->searchClient($dni);
                if ($queryUser>0) {
                    $data = $queryUser;
                }else {
                    $data = 0;
                }
                echo json_encode($data,JSON_UNESCAPED_UNICODE);
         }

}