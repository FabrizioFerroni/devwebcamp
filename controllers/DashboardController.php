<?php

namespace Controllers;

use MVC\Router;
use Model\Registro;
use Model\Regalo;
use Model\Paquete;
use Model\Usuario;
use Model\Evento;
use Classes\Paginacion;

class DashboardController
{
    public static function Index(Router $router)
    {
        if(!is_admin()){
            header('Location: /iniciarsesion');
            return;
         }

        //  Obtener los ultimos registros
        $registros = Registro::get(5);
        foreach($registros as $registro){
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        // Calcular los ingresos 
        $virtuales = Registro::total('paquete_id', 2);
        $presenciales = Registro::total('paquete_id', 1);

        $ingresos = ($virtuales * 46.41) + ($presenciales * 189.54);

        // Obtener eventos con mas y menos lugares disponibles
        $menos_disponibles = Evento::ordenarLimite('disponibles', 'ASC', 5);
        $mas_disponibles = Evento::ordenarLimite('disponibles', 'DESC', 5);
        

        $router->render('admin/dashboard/index', [
            'titulo' => 'Tablero',
            'nombre' => $_SESSION['nombre'],
            'registros' => $registros,
            'ingresos' => $ingresos,
            'menos_disponibles' => $menos_disponibles,
            'mas_disponibles' => $mas_disponibles,
        ]);
    }
}
