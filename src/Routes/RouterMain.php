<?php
namespace App\Routes;

use EasyProjects\SimpleRouter\Router as Router;

// use EasyProjects\SimpleRouter\Request as Request;
// use EasyProjects\SimpleRouter\Response as Response;



$router = new Router;
$router->cors(
    "*",
    "*",
    "*"
);

//$router->autoload();
new Usuarios($router);
