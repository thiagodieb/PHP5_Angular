<?php
include '../autoload.php';

use Classes\Model\UsuarioModel;
$request = $_REQUEST;

$usuarioModel = new UsuarioModel();
if(isset($request['acao']) && $request['acao'] == "l"){
        header("Content-Type:application/json");
        $users = $usuarioModel->listar();
        echo json_encode($users);
        //echo '[{"nome":"Joao e Maria","idade":10,"id":1}]';
        exit();
}


if (isset($request['id']) && isset($request['acao'])) {
    if($request['acao'] == "d"){
        $usuarioModel->deletar($request['id']);
    }
    if($request['acao'] == "v"){
    	header("Content-Type:application/json");
    	$user = $usuarioModel->hidratar($request['id'],false);
        //var_dump($user);
        echo json_encode($user);
        exit();
    }

    

}else if(isset($request['data'])){

    $user = json_decode($request['data']);
    //$user = json_decode($request['data'],true);
    $usuarioEntity = $usuarioModel->popular((Array) $user);
    if($user->id)
        $usuarioModel->editarjson($usuarioEntity);
    else
        $usuarioModel->salvar($usuarioEntity);
}
else if (isset($request['id']) && $request["id"] != ""){
    $usuarioEntity = $usuarioModel->popular($request);
    $usuarioModel->editar($usuarioEntity);
}else if( isset($request['id']) && $request["id"] == "" ) {
    $usuarioEntity = $usuarioModel->popular($request);
    $usuarioModel->salvar($usuarioEntity);
}







