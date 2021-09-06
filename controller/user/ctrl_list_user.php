<?php 

    require '../../model/modelUser.php';

    $model = new ModelUser();
    $queryUser = $model-> listUser();
    //Es- Reducir la siguiente condicion :)
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