<?php

namespace Controller;

use Model\NotaModel;

class NotaController {

    public function __construct(){
        switch (@$_REQUEST['action']) {
            case 'salvar':
                $this->salvar();
                break;
            case 'listar':
                $this->listar();
                break;    
            case 'editar':
                $this->editar();
                break;                    
            case 'excluir':
                $this->excluir();
                break;                   
            default:
                exit("error page");
                break;
        }

    }

    private function editar(){
        $notaModel = new NotaModel();
        if(isset($_REQUEST['data'])){
            $aluno = json_decode($_REQUEST['data'],true);
            $notaModel->editar($aluno[0]);
        }
        
    }

    private function excluir(){
        $notaModel = new NotaModel();
        if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
            $notaModel->excluir($_REQUEST);
        }
        
    }

    private function salvar(){
        $notaModel = new NotaModel();
        if(isset($_REQUEST['data'])){
            $alunos = json_decode($_REQUEST['data'],true);
            foreach ($alunos as $key => $value) {
                $notaModel->salvar($alunos[$key]);    
            }
        }
        
    }

    private function listar(){
        $notaModel = new NotaModel();
        header("Content-Type:application/json");
        echo json_encode($notaModel->listar());
    }
}