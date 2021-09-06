<?php 

    require '../../../model/modelPerson.php';

    $model = new ModelPerson();
    $queryClient = $model-> listClient();
    //Es- Reducir la siguiente condicion :)
    if ($queryClient) {
        echo json_encode($queryClient);
    }else {
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }

?>