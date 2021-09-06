<?php 
$id= $_POST['id'];
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$rol=$_POST['rol'];
$user= $_POST['user'];

session_start();
$_SESSION['se_id']=$id;
$_SESSION['se_fname']=$firstName;
$_SESSION['se_lname']=$lastName;
$_SESSION['se_rol']=$rol;
$_SESSION['se_user']=$user;
?>