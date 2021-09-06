<?php

require '../../model/modelUser.php';

$model = new ModelUser();

$ctrlId = htmlspecialchars($_POST['edit_id'], ENT_QUOTES, 'UTF-8');
$ctrlRol = htmlspecialchars($_POST['edit_rolusuario'], ENT_QUOTES, 'UTF-8');
$ctrlNombres = htmlspecialchars($_POST['edit_nombres'], ENT_QUOTES, 'UTF-8');
$ctrlApellidos = htmlspecialchars($_POST['edit_apellidos'], ENT_QUOTES, 'UTF-8');
$ctrlDni = htmlspecialchars($_POST['edit_dni'], ENT_QUOTES, 'UTF-8');
$ctrlUsuarios = htmlspecialchars($_POST['edit_username'], ENT_QUOTES, 'UTF-8');
$ctrlCorreo = htmlspecialchars($_POST['edit_correo'], ENT_QUOTES, 'UTF-8');
$ctrlTelefono = htmlspecialchars($_POST['edit_phone'], ENT_QUOTES, 'UTF-8');

$queryUser = $model->editUser($ctrlId, $ctrlRol, $ctrlNombres, $ctrlApellidos, $ctrlDni, $ctrlUsuarios, $ctrlCorreo, $ctrlTelefono);
//$data = json_encode($queryUser);
echo $queryUser;
