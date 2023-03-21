<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Registro;
use Model\Regalo;
use Model\Paquete;
use Model\Usuario;
use MVC\Router;

class RegistradosController
{
    public static function Index(Router $router)
    {
        if(!is_admin()){
            header('Location: /iniciarsesion');
            return;
         }

         $pagina_actual = $_GET['pagina'] ?? 1;
         $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT); 
         if(!$pagina_actual || $pagina_actual < 1){
            header('Location:/admin/usuarios-registrados');
         }
         
         $registro_por_pagina = 10;
         $total = Registro::total();
   
         $paginacion = new Paginacion($pagina_actual, $registro_por_pagina, $total);
            
         if($paginacion->total_paginas() < $pagina_actual) header('Location:/admin/usuarios-registrados');
   
      
         $registros = Registro::paginar($registro_por_pagina, $paginacion->offset());
         foreach($registros as $registro){
            $registro->usuario = Usuario::find($registro->usuario_id);
            $registro->paquete = Paquete::find($registro->paquete_id);
            $registro->regalo = Regalo::find($registro->paquete_id);
         }
        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios registrados',
            'nombre' => $_SESSION['nombre'],
            'registros' => $registros,
            'paginacion' => $paginacion->paginacion()
        ]);
    }
}
