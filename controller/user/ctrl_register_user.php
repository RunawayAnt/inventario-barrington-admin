<?php

require '../../model/modelUser.php';

$model = new ModelUser();

$ctrlRol = htmlspecialchars($_POST['rrolpersonal'], ENT_QUOTES, 'UTF-8');
$ctrlNombres = htmlspecialchars($_POST['rnombres'], ENT_QUOTES, 'UTF-8');
$ctrlApellidos = htmlspecialchars($_POST['rapellidos'], ENT_QUOTES, 'UTF-8');
//trim
$ctrlTrimNom=trim($ctrlNombres);
$ctrlTrimApe=trim($ctrlApellidos);
//
$ctrlDni = htmlspecialchars($_POST['rdni'], ENT_QUOTES, 'UTF-8');
$ctrlUsuarios = htmlspecialchars($_POST['rusername'], ENT_QUOTES, 'UTF-8');
$ctrlCorreo = htmlspecialchars($_POST['rcorreo'], ENT_QUOTES, 'UTF-8');
$ctrlTelefono = htmlspecialchars($_POST['rphone'], ENT_QUOTES, 'UTF-8');
$ctrlPass = password_hash($_POST['rpassword'],PASSWORD_DEFAULT,['cost'=>10]);

$queryUser = $model-> registerUser($ctrlRol,$ctrlTrimNom,$ctrlTrimApe,$ctrlDni,$ctrlUsuarios,$ctrlCorreo
,$ctrlTelefono,$ctrlPass);
//$data = json_encode($queryUser);
echo $queryUser;