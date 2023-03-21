<?php

namespace Controllers;

use MVC\Router;

class RegalosController
{
    public static function Index(Router $router)
    {
        if(!is_admin()){
            header('Location: /iniciarsesion');
         }
        $router->render('admin/regalos/index', [
            'titulo' => 'Regalos',
            'nombre' => $_SESSION['nombre']
        ]);
    }
}
