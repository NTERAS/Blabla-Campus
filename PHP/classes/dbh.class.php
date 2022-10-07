<?php

class Dbh {

    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbname = "blablacampus";

    protected function connect(){

        try {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8mb4";
            $dbh = new PDO($dsn,$this->user,$this->pwd);
            // $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "connection succeed!";
            return $dbh;

        } catch (PDOException $e) {
            print "error : ".$e->getMessage();
            die();
        }
    }
    
}
