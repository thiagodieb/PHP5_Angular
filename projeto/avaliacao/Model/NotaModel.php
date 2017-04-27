<?php

namespace Model;

use Model\Mysql;
use Exception;

class NotaModel{

    private $con;

    public function __construct() {
        $this->con = new Mysql();
    }

    public function listar() {
        $sql = "SELECT * FROM tb_alunos;";
        return $this->con->executarQuery($sql);
    }

    public function excluir($entity){
        $sql = "DELETE FROM tb_alunos where id={$entity['id']}";
        //var_dump($sql);exit();
        return $this->con->executarQuerySimple($sql);   
    }

    public function editar($entity) {
        $sql = "UPDATE tb_alunos";
        $sql.= " SET ";
        $sql.= " nome = '{$entity['nome']}', ";
        $sql.= " turma = '{$entity['turma']}' , ";
        $sql.= " nota1 = {$entity['nota1']} , ";
        $sql.= " nota2 = {$entity['nota2']} , ";
        $sql.= " nota3 = {$entity['nota3']} , ";
        $sql.= " nota4 = {$entity['nota4']} ";
        $sql.=" where id = {$entity['id']}";
        //var_dump($sql);
        try {
            $this->con->inserirQuery($sql);
            echo "OK";
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }


    public function salvar($entity) {

        $sql = "INSERT INTO tb_alunos";
        if(isset($entity['0']) && is_array($entity['0'])){
            $sql.= " values";
            $i=0;
            foreach ($entity as $key => $value) {
                $sql.=' ( ';
                $sql = $this->elementos($entity[$key],$sql);
                $sql.= ' ) ';

                if(count($entity)-1 != $i)
                    $sql.=',';
                $i++;
                
            }

        }else{

            $sql.= " values (";
            $sql = $this->elementos($entity,$sql);
            $sql.= " )";
        }

        //var_dump($sql);exit();

        try {
            $this->con->inserirQuery($sql);
            echo "OK";
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    private function elementos ($entity,$sql){
        $i=0;
        foreach ($entity as $key => $value) {
            if(is_numeric($entity[$key])){
                $sql.="{$entity[$key]}";    
            }else{
                $sql.="'{$entity[$key]}'";    
            }            
            if(count($entity)-1 != $i)
                $sql.=',';
            $i++;
        }
        return $sql;
    }
}
