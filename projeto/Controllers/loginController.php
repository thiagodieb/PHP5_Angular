<?php
session_cache_expire(1);
session_start();
include '../autoload.php';

use Classes\Model\Autenticacao;

$request = $_REQUEST;

if($request['acao'] == 'logout'){
	unset($_SESSION['usuario']);
	header("Location:../template/form-login.php");
	exit();
}

$autenticacao = new Autenticacao();
$result = $autenticacao->verificarUsuario($request);

if($result){

    $_SESSION['usuario'] = Array();
	$_SESSION['usuario']["nome"] = $result->getNome();
	$_SESSION['usuario']["login"] = true;
	
    header("Location:../template/lista-usuario.php?login=".$result->getNome());

}else{

    header("Location:../template/form-login.php");

}




