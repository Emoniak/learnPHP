<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 13/03/2018
 * Time: 14:02
 */

class Queries
{
    //DSN : Data Source Name
    private $dsn = "mysql:dbname=ap;host=localhost;chaset=utf-8";
    private $user = "ap";
    private $password="ap";
    private $db;

    public function __construct()
    {
        try{
            $this->db = new PDO($this->dsn,$this->user,$this->password);
            $this->db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }catch (PDOException $e){
            log::logWrite($e->getMessage());
        }
    }

    function insert($sql)
    {
        return $this->db -> exec($sql);
    }

    public function __destruct()
    {
        unset($this->db);
    }
}