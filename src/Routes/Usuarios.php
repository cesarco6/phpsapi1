<?php
namespace App\Routes;

use App\Controllers\UsuariosController;
use EasyProjects\SimpleRouter\Router;


class Usuarios
{
    private $userController;

    public function __construct(Router $router)
    {
        $this->userController = new UsuariosController;

        $router->get('/usuarios', function($req, $res){
            //midleware
            $this->userController->listUsuarios($req, $res);
        });
    }
}
