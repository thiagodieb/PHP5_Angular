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

        $usuarioEntity->setNome($entity["nome"]);
        $usuarioEntity->setIdade($entity["idade"]);
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

    public function editar($entity) {
        
    }

}
