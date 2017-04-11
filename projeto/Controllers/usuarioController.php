<?php
include '../autoload.php';

use Classes\Model\UsuarioModel;
$request = $_REQUEST;

$usuarioModel = new UsuarioModel();
if (isset($request['id']) && isset($request['acao'])) {
    if($request['acao'] == "d"){
        $usuarioModel->deletar($request['id']);
    }
}else if (isset($request['id']) && $request["id"] != ""){
    $usuarioEntity = $usuarioModel->popular($request);
    $usuarioModel->editar($usuarioEntity);
}else if( isset($request['id']) && $request["id"] == "" ) {
    $usuarioEntity = $usuarioModel->popular($request);

    $usuarioModel->salvar($usuarioEntity);
}


