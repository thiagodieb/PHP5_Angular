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
            header('Location:template/form-login.php');
        }else{
            header('Location:template/lista-usuario.php');
        }
    }

    public function verificarUsuario($request){
        $usuarioModel = new UsuarioModel();
		$usuarioEntity = $usuarioModel->popular($request);

		return $usuarioModel->logar($usuarioEntity);
    }
}
