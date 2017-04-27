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
            default:
                exit("error page");
                break;
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