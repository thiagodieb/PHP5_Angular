<?php

namespace Classes\Persistence;

use Classes\Persistence\Factory;
use PDO;

/**
 * 
 * @desc Essa classe � respons�vel...
 * @author nataniel.paiva
 *
 */
class Mysql {

    private static $con;

    public function connect() {
        $arrayConexao = array(
            "host" => "localhost",
            "dbname" => "db_projeto",
            "username" => "root",
            "password" => ""
        );

        if (!isset(self::$con)) {
            self::$con = 
                    Factory::factory($arrayConexao);
        }

        return self::$con;
    }

    public function executarQuery($sql){
        $this->connect();
        return self::$con->query($sql)
                ->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function inserirQuery($sql){
        $this->connect();
        self::$con->query($sql);
    }

}
