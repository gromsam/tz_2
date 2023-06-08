<?php

class DBMysql
{

    private $db = null;

    /**
     * Подключение к базе MySQL
     *
     * @param $hostname
     * @param $username
     * @param $password
     * @param $database
     */
    public function __construct($hostname = "localhost", $username = "root", $password = "", $database = "")
    {
        try{

            $this->db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

        }catch(PDOException $e){
//            echo "Connection failed: " . $e->getMessage();
            print "Ошибка подключения к базе!";
            die();
        }

    }

    public function query( $query = "" , $params = [] )
    {

        try{

            $result = $this->db->query($query);
            return $result;

        }catch(PDOException $e){
            echo "Query failed: " . $e->getMessage();
        }

        return false;
    }

}