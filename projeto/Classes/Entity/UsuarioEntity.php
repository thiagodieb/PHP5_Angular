<?php

namespace Classes\Entity;

class UsuarioEntity {

    public $id;
    public $nome;
    public $idade;
    public $email;
    public $senha;

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

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

}
