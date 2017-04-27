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
