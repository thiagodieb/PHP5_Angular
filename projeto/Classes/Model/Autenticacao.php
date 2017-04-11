<?php
namespace Classes\Model;

/**

 * @author Nataniel
 */
class Autenticacao {
    
    public function verificaLogin(){
        session_start();
        if(!isset($_SESSION['usuario'])){
            header('Location:/projeto13/template/form-login.php');
        }
    }
}
