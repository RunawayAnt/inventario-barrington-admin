<?php 

require '../../../model/modelPerson.php';

$model = new ModelPerson();
$queryProvider = $model-> listProvider();
//Es- Reducir la siguiente condicion :)
if ($queryProvider) {
    echo json_encode($queryProvider);
}else {
    echo '{
        "sEcho": 1,
        "iTotalRecords": "0",
        "iTotalDisplayRecords": "0",
        "aaData": []
    }';
}
?>