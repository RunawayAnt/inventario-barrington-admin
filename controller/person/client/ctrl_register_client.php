<?php

require '../../../model/modelPerson.php';

$model = new ModelPerson();

$ctrlNombres = htmlspecialchars($_POST['clnombres'], ENT_QUOTES, 'UTF-8');
$ctrlApellidos = htmlspecialchars($_POST['clapellidos'], ENT_QUOTES, 'UTF-8');
//trim
$ctrlTrimNom=trim($ctrlNombres);
$ctrlTrimApe=trim($ctrlApellidos);
//
$ctrlCorreo = htmlspecialchars($_POST['clcorreo'], ENT_QUOTES, 'UTF-8');
$ctrlPhone = htmlspecialchars($_POST['clphone'], ENT_QUOTES, 'UTF-8');
$ctrlDNI = htmlspecialchars($_POST['cldni'], ENT_QUOTES, 'UTF-8');

$queryClient = $model-> registerClient($ctrlTrimNom,$ctrlTrimApe,$ctrlDNI,$ctrlPhone,$ctrlCorreo);
//$data = json_encode($queryUser);
echo $queryClient;



?>