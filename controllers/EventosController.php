<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\Hora;
use Model\Ponente;
use Model\Evento;
use MVC\Router;
use Classes\Paginacion;

class EventosController
{
    public static function Index(Router $router)
    {
        if (!is_admin()) {
            header('Location: /iniciarsesion');
            return;
        }

        $pagina_actual = $_GET['pagina'] ?? 1;
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location:/admin/eventos');
        }

        $registro_por_pagina =  10;
        $total = Evento::total();

        $paginacion = new Paginacion($pagina_actual, $registro_por_pagina, $total);

        $eventos = Evento::paginar($registro_por_pagina, $paginacion->offset());
        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
        }

        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
            'nombre' => $_SESSION['nombre'],
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function Crear(Router $router)
    {
        if (!is_admin()) {
            header('Location: /iniciarsesion');
            return;
        }
        $alertas = [];
        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $ponentes = Ponente::all('ASC');

        $evento = new Evento;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /iniciarsesion');
                return;
            }
            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if (empty($alertas)) {
                $resultado = $evento->guardar();
                if ($resultado) {
                    header('Location:/admin/eventos');
                }
            }
        }

        $alertas = Evento::getAlertas();

        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar evento',
            'nombre' => $_SESSION['nombre'],
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'ponentes' => $ponentes,
            'evento' => $evento
        ]);
    }

    public static function Editar(Router $router)
    {
        if (!is_admin()) {
            header('Location: /iniciarsesion');
            return;
        }
        $alertas = [];
        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $ponentes = Ponente::all('ASC');

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) header('Location: /admin/ponentes');

        $evento = Evento::find($id);
        if (!$evento) header('Location: /admin/eventos');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /iniciarsesion');
                return;
            }
            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if (empty($alertas)) {
                $resultado = $evento->guardar();
                if ($resultado) {
                    header('Location:/admin/eventos');
                }
            }
        }

        $alertas = Evento::getAlertas();

        $router->render('admin/eventos/editar', [
            'titulo' => 'Editar evento',
            'nombre' => $_SESSION['nombre'],
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'ponentes' => $ponentes,
            'evento' => $evento
        ]);
    }

    public static function Eliminar()
    {
        if (!is_admin()) {
            header('Location: /iniciarsesion');
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!is_admin()) {
                header('Location: /iniciarsesion');
                return;
            }
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if (!$id) header('Location: /admin/eventos');

            $evento = Evento::find($id);
            if (!$evento) header('Location: /admin/eventos');

            $resultado = $evento->eliminar();
            if ($resultado) {
                header('Location: /admin/eventos');
            }
        }
    }
}
