<?php

require '../../../model/modelPerson.php';

$model = new ModelPerson();

$ctrlEmp = htmlspecialchars($_POST['prnombre'], ENT_QUOTES, 'UTF-8');
$ctrlDirec = htmlspecialchars($_POST['prdirecc'], ENT_QUOTES, 'UTF-8');
//trim
$ctrlTrimEmp=trim($ctrlEmp);
$ctrlTrimDirec=trim($ctrlDirec);
//
$ctrlCorreo = htmlspecialchars($_POST['premail'], ENT_QUOTES, 'UTF-8');
$ctrlTelef = htmlspecialchars($_POST['prtelf'], ENT_QUOTES, 'UTF-8');
$ctrlRUC = htmlspecialchars($_POST['prruc'], ENT_QUOTES, 'UTF-8');


$queryProvider = $model-> registerProvider($ctrlRUC,$ctrlTrimEmp,$ctrlTrimDirec,$ctrlCorreo,$ctrlTelef);
//$data = json_encode($queryUser);
echo $queryProvider;

?>