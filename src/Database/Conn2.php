<?php

namespace App\Database;

use PDO;
use PDOException;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__,2));
$dotenv->load();

class Conn2
{
    private $hostDB;
    private $dataDB;
    private $userDB;
    private $passDB;
    public static $conn = null;

    public function __construct()
    {
        if(self::$conn ==null){
            $this->hostDB = $_ENV['SERVER'];
            $this->dataDB = $_ENV['DATABASE'];
            $this->userDB = $_ENV['DBuser'];
            $this->passDB = $_ENV['DBpass'];
            $ops = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            try {            
                self::$conn = new PDO("mysql:host=$this->hostDB;dbname=$this->dataDB"
                                    ,$this->userDB,$this->passDB, $ops);
            } catch (PDOException $e) {
              echo 'Error de coneccion BD: ' . $e->getMessage();
            }
        }
    }

    public function getConn()
    {
        return self::$conn;
    }
}