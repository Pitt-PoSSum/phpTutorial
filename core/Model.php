<?php
namespace core;

class Model
{
    protected $conn;

    function __construct()
    {
        $this->openCon();
    }

    function __destruct()
    {
        $this->closeCon();
    }

    public function openCon() {
        $dbInstance = ConnectDB::getInstance();
        $this->conn = $dbInstance->getConnection();

        return $this->conn;
    }

    public function getAllTableData($sql){
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $set = array();
            while ($row = $result->fetch_assoc()) {
                $set[array_shift($row)] = $row;
            }
        return $set;
        } else {
            return null;
        }
    }

    public function getMaxId($table){
        $result = $this->conn->query('SELECT MAX(id) as maxId FROM '.$table);

        if ($result->num_rows > 0) {

            if ($row = $result->fetch_assoc()) {
                return $row['maxId'];
            }else{
                return null;
            }

        } else {
            return null;
        }
    }

    public function getTableData($sql){
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {

            if ($row = $result->fetch_assoc()) {
                return $row;
            }else{
                return null;
            }

        } else {
            return null;
        }
    }

    public function removeTableData($sql){
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function closeCon() {
        if($this->conn){
            $this->conn->close();
        }
    }

}