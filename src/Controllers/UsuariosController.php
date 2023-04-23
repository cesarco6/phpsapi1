<?php

namespace App\Controllers;

use EasyProjects\SimpleRouter\Request;
use EasyProjects\SimpleRouter\Response;
use App\Models\UsuariosModel;

class UsuariosController 
{
    private $usuariosModel;

    public function __construct()
    {
        $this->usuariosModel = new UsuariosModel();
    }

    public function listUsuarios(Request $req, Response $res)
    {
        $usuarios = $this->usuariosModel->listUsuarios();
        if($usuarios) {
            $res->status(200)->send(["data" => $usuarios]);
        }else{ 
            $res->status(500)->send(["message" => "Error en la consulta"]);
        }
    }
}