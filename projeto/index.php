<?php 
include 'autoload.php';

use Classes\Model\UsuarioModel;
use Classes\Model\Autenticacao;
$ve = new Autenticacao();
$ve->verificaLogin();
?>