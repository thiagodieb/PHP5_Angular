<?php

namespace Model;

use Model\Factory;
use PDO;

class Mysql {

    private static $con;

    public function connect() {
        $arrayConexao = array(
            "host" => "localhost",
            "dbname" => "php_angular_avaliacao",
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
    
    public function executarQuerySimple($sql){
        $this->connect();
        return self::$con->query($sql);
    }

    public function inserirQuery($sql){
        $this->connect();
        self::$con->query($sql);
    }

}
