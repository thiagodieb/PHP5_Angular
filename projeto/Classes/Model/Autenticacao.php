<?php
namespace Classes\Model;

use Classes\Entity\UsuarioEntity;
use Classes\Model\UsuarioModel;

/**

 * @author Nataniel
 */
class Autenticacao {
    
    public function verificaLogin(){
        session_start();
        if(!isset($_SESSION['usuario'])){
            header('Location:template/index.php');
        }else{
            header('Location:template/index.php');
        }
    }

    public function verificarUsuario($request){
        $usuarioModel = new UsuarioModel();
        if($request['data']){
            $user = json_decode($request['data']);
            //$user = json_decode($request['data'],true);
            $user = (Array) $user;    
        }else{
            $user = $request;
        }

        $usuarioEntity = $usuarioModel->popular($user);		
		return $usuarioModel->logar($usuarioEntity);
    }
}
