<?php 

    require '../../model/modelSell.php';

    $model = new ModelSell();
    $queryUser = $model-> listSupply();
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