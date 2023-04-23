<?php

namespace App\Database;

use PDO;
use PDOException;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__,2));
$dotenv->load();


    class Conection extends PDO 
    {
        private $hostDB;
        private $dataDB;
        private $userDB;
        private $passDB;

        public function __construct()
        {       
            $this->hostDB = $_ENV['SERVER'];
            $this->dataDB = $_ENV['DATABASE'];
            $this->userDB = $_ENV['DBuser'];
            $this->passDB = $_ENV['DBpass'];
            $ops = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try {            
            parent::__construct("mysql:host=$this->hostDB;dbname=$this->dataDB"
                                ,$this->userDB,$this->passDB, $ops);
        } catch (PDOException $e) {
          echo 'Error de coneccion BD: ' . $e->getMessage();
        }
    }

    
}