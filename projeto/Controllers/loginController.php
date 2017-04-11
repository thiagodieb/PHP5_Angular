<?php
session_cache_expire(1);
session_start();
include '../autoload.php';
$request = $_REQUEST;

$email = "admin@admin.com";
$senha = "admin";

if( $email == $request['email'] && $senha === $request['senha'] ){
    $_SESSION['usuario'] = $request['email'];
    header("Location:/projeto13/index.php");
}else{
    header("Location:../template/form-login.php");
}



