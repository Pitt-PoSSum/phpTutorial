<?php
namespace core;

class ConnectDB
{
    private static $instance = null;
    private $conn;

    private function __construct() {
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $db = "test";
        $this->conn = new \mysqli($dbHost, $dbUser, $dbPass,$db) or die("Connect failed: %s\n". $this->conn -> error);
    }

    private function __clone(){}

    public static function getInstance():ConnectDB{
        if(!self::$instance){
            self::$instance = new ConnectDB();
        }

        return self::$instance;
    }

    public function getConnection(){
        return $this->conn;
    }
}