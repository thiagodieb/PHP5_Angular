<?php

namespace Classes\Model;

use Classes\Entity\UsuarioEntity;
use Classes\Interfaces\CrudInterface;
use Classes\Persistence\Mysql;
use Exception;

class UsuarioModel implements CrudInterface {

    private $con;

    public function __construct() {
        $this->con = new Mysql();
    }

    /*
     * @params array
     * @retun UsuarioEntity
     */

    public function popular($entity) {
        $usuarioEntity = new UsuarioEntity();
        $usuarioEntity->setNome($entity["Nome"]);
        $usuarioEntity->setIdade($entity["idade"]);
        if(isset($entity["id"]))
            $usuarioEntity->setId($entity["id"]);
        
        if(isset($entity["email"]))
            $usuarioEntity->setEmail($entity["email"]);        

        if(isset($entity["senha"]))
            $usuarioEntity->setSenha($entity["senha"]);                
        return $usuarioEntity;
    }

    public function deletar($id) {
        $sql = "DELETE FROM tb_usuario where id = " . $id;
        try {
            $this->con->inserirQuery($sql);
            header("Location:../template/lista-usuario.php");
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function listar() {
        $sql = "SELECT * FROM tb_usuario;";
        return $this->con->executarQuery($sql);
    }

    public function salvar($entity) {

        $sql = "INSERT INTO tb_usuario (nome, idade) "
                . "values ('{$entity->getNome()}',{$entity->getIdade()})";

        try {
            $this->con->inserirQuery($sql);
            header("Location:../template/lista-usuario.php");
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function hidratar($id){
        $sql = "SELECT * FROM tb_usuario where id = {$id}";
        $resultado = $this->con->executarQuery($sql);
        
        $usuario = new UsuarioEntity();
        
        $usuario->setNome($resultado[0]["nome"]);
        $usuario->setIdade($resultado[0]["idade"]);
        $usuario->setEmail($resultado[0]["email"]); 
        $usuario->setId($resultado[0]["id"]);
        
        return $usuario;
    }

    public function logar($entity){
        $sql = "SELECT * FROM tb_usuario where email = '{$entity->getEmail()}'";
        $resultado = $this->con->executarQuery($sql);
        $usuario = new UsuarioEntity();
        
        if(@$resultado[0]["senha"] === $entity->getSenha()){
            $usuario->setNome($resultado[0]["nome"]);
            $usuario->setEmail($resultado[0]["email"]); 
            $usuario->setEmail($resultado[0]["senha"]); 
            $usuario->setId($resultado[0]["id"]);   
        }else{
            return false;
        }
        
        return $usuario;
    }

    public function editar($entity) {
        $sql = "UPDATE tb_usuario SET nome = '{$entity->getNome()}', "
        ." email = '{$entity->getEmail()}' , "
        ." senha = '{$entity->getSenha()}' , "
        ." idade =  {$entity->getIdade()} where id = {$entity->getId()}";

        try {
            $this->con->inserirQuery($sql);
            header("Location:../template/lista-usuario.php");
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
