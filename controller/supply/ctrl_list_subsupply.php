<?php 

    require '../../model/modelSell.php';

    $model = new ModelSell();
    $id_venta = $_POST['idventa'];
    $queryUser = $model-> listSubsupply($id_venta);
    if ($queryUser) {
        echo json_encode($queryUser);
    }else {
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }

?>