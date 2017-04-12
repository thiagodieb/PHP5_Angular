<?php
session_cache_expire(1);
session_start();
include '../autoload.php';

use Classes\Model\Autenticacao;

$request = $_REQUEST;

if($request['acao'] == 'logout'){
	unset($_SESSION['usuario']);
	
}

$autenticacao = new Autenticacao();
$result = $autenticacao->verificarUsuario($request);

if($result){

    $_SESSION['usuario'] = $result->getEmail();
    header("Location:../template/lista-usuario.php");

}else{

    header("Location:../template/form-login.php");

}



