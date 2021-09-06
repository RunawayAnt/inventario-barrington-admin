<?php

require '../../../model/modelPerson.php';

$model = new ModelPerson();

$ctrlId = htmlspecialchars($_POST['edid'], ENT_QUOTES, 'UTF-8');
$ctrlRuc = htmlspecialchars($_POST['edruc'], ENT_QUOTES, 'UTF-8');
$ctrlEmpresa = htmlspecialchars($_POST['edrazonsocial'], ENT_QUOTES, 'UTF-8');
$ctrlDireccion = htmlspecialchars($_POST['eddireccion'], ENT_QUOTES, 'UTF-8');
$ctrlCorreo = htmlspecialchars($_POST['edcorreo'], ENT_QUOTES, 'UTF-8');
$ctrlTelefono = htmlspecialchars($_POST['edtelefono'], ENT_QUOTES, 'UTF-8');

$queryProvider = $model->editProvider($ctrlId, $ctrlRuc, $ctrlEmpresa, $ctrlDireccion,$ctrlCorreo,$ctrlTelefono);
echo $queryProvider;
