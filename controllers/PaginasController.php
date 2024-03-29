<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use Model\Usuario;
use MVC\Router;

class PaginasController{

    public static function Index(Router $router){
        
        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach($eventos as $evento){

            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
            
            if($evento->dia_id === "1" && $evento->categoria_id === "1"){
                $eventos_formateados['conferencias_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "1"){
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            if($evento->dia_id === "1" && $evento->categoria_id === "2"){
                $eventos_formateados['workshops_v'][] = $evento;
            }
            if($evento->dia_id === "2" && $evento->categoria_id === "2"){
                $eventos_formateados['workshops_s'][] = $evento;
            }
        }

        // Obtener el totoal de cada bloque 
        $ponentes_total = Ponente::total();
        $conferencias_total = Evento::total('categoria_id', '1');
        $workshops_total = Evento::total('categoria_id', '2');
        $registrados_total = Usuario::total('admin', '0');

        // Obtener todos los ponentes
        $ponentes = Ponente::all();
        
        $router->render('pages/index', [
            'titulo' => 'Inicio',
            'eventos' => $eventos_formateados,
            'ponentes_total' => $ponentes_total,
            'conferencias_total' => $conferencias_total,
            'workshops_total' => $workshops_total,
            'registrados_total' => $registrados_total,
            'ponentes' => $ponentes
        ]);
    }
    public static function Eventos(Router $router){
        
        
        $router->render('pages/devwebcamp', [
            'titulo' => 'Sobre WebDevCamp'
        ]);
    }

    public static function Paquetes(Router $router){
        
        
        $router->render('pages/paquetes', [
            'titulo' => 'Paquetes WebDevCamp'
        ]);
    }

    public static function Conferencias(Router $router){
        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach($eventos as $evento){

            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
            
            if($evento->dia_id === "1" && $evento->categoria_id === "1"){
                $eventos_formateados['conferencias_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "1"){
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            if($evento->dia_id === "1" && $evento->categoria_id === "2"){
                $eventos_formateados['workshops_v'][] = $evento;
            }
            if($evento->dia_id === "2" && $evento->categoria_id === "2"){
                $eventos_formateados['workshops_s'][] = $evento;
            }
        }
        
        $router->render('pages/conferencias', [
            'titulo' => 'Conferencias & Workshops',
            'eventos' => $eventos_formateados
        ]);
    }

    public static function Error(Router $router){
        $router->render('pages/error', [
            'titulo' => 'Página no encontrada'
        ]);
    }
}