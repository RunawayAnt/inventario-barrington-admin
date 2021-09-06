<?php 

    require '../../model/modelCategory.php';

    $model = new ModelCategory();
    $queryCategory = $model-> listCategory();
    //Es- Reducir la siguiente condicion :)
    if ($queryCategory) {
        echo json_encode($queryCategory);
    }else {
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }
?>