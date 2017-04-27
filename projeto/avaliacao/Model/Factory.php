<?php

namespace Model;

use PDO;

class Factory {

    public static function factory($arrayConexao) {
        $con = new PDO(
                "mysql:host={$arrayConexao['host']}"
                . ";dbname={$arrayConexao['dbname']}", 
                        $arrayConexao['username'], 
                        $arrayConexao['password']);

        $con->setAttribute(PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION);

        return $con;
    }

}

?>
