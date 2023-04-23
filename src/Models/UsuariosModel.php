<?php

namespace App\Models;

use App\Database\Conn2;


class UsuariosModel
{
    private $conn;
    public function __construct()
    {
        $data = new Conn2;
        $this->conn = $data->getConn();
    }

    public function listUsuarios()
    {
        $sql = "SELECT * FROM notas";
        $query = $this->conn->prepare($sql);
        if($query->execute()) {
            return $query->fetchAll();
        }else {
            return false;
        }
    }
}