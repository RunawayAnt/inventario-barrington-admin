<?php

require '../../../model/modelPerson.php';

$model = new ModelPerson();

$ctrlId = htmlspecialchars($_POST['edid'], ENT_QUOTES, 'UTF-8');
$ctrlNombres = htmlspecialchars($_POST['ednombres'], ENT_QUOTES, 'UTF-8');
$ctrlApellidos = htmlspecialchars($_POST['edapellidos'], ENT_QUOTES, 'UTF-8');
$ctrlDni = htmlspecialchars($_POST['eddni'], ENT_QUOTES, 'UTF-8');
$ctrlTelefono = htmlspecialchars($_POST['edtelf'], ENT_QUOTES, 'UTF-8');
$ctrlCorreo = htmlspecialchars($_POST['edcorreo'], ENT_QUOTES, 'UTF-8');

$queryClient = $model->editClient($ctrlId, $ctrlNombres, $ctrlApellidos, $ctrlDni,$ctrlTelefono,$ctrlCorreo);
echo $queryClient;
