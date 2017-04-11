<?php
namespace Classes\Entity;

class UsuarioEntity{
    private $nome;
    private $idade;
    
    function getNome() {
        return utf8_encode($this->nome);
    }

    function getIdade() {
        return $this->idade;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

}

