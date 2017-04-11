<?php
namespace Classes\Interfaces;

interface CrudInterface {
    function salvar($entity);
    
    function deletar($id);
    
    function editar($entity);
    
    /*  
     * return entity
     */
    function listar();
    
    function popular($entity);
}

