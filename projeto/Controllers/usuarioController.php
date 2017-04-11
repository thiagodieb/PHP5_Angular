<?php
include '../autoload.php';

use Classes\Model\UsuarioModel;
$request = $_REQUEST;

$usuarioModel = new UsuarioModel();
if (isset($request['id']) && isset($request['acao'])) {
    if($request['acao'] == "d"){
        $usuarioModel->deletar($request['id']);
    }
    if($request['acao'] == "v"){
    	header("Content-Type:application/json");
    	$user = $usuarioModel->hidratar($request['id']);
        //var_dump($user);
        echo json_encode($user);
    }
}else if (isset($request['id']) && $request["id"] != ""){
    $usuarioEntity = $usuarioModel->popular($request);
    $usuarioModel->editar($usuarioEntity);
}else if( isset($request['id']) && $request["id"] == "" ) {
    $usuarioEntity = $usuarioModel->popular($request);

    $usuarioModel->salvar($usuarioEntity);
}


