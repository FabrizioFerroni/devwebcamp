<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIEventoController;
use Controllers\APIPonenteController;
use Controllers\APIRegalosController;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\EventosController;
use Controllers\PaginasController;
use Controllers\PonentesController;
use Controllers\RegalosController;
use Controllers\RegistradosController;
use Controllers\RegistroController;
use MVC\Router;

$router = new Router();

// Login
$router->get('/iniciarsesion', [AuthController::class, 'Login']);
$router->post('/iniciarsesion', [AuthController::class, 'Login']);
$router->post('/cerrarsesion', [AuthController::class, 'Logout']);

// Crear Cuenta
$router->get('/registrarse', [AuthController::class, 'Registro']);
$router->post('/registrarse', [AuthController::class, 'Registro']);

// Formulario de olvide mi password
$router->get('/olvide-clave', [AuthController::class, 'Olvide']);
$router->post('/olvide-clave', [AuthController::class, 'Olvide']);

// Colocar el nuevo password
$router->get('/recuperar-clave', [AuthController::class, 'Reestablecer']);
$router->post('/recuperar-clave', [AuthController::class, 'Reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'Mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'Confirmar']);

// Rutas Admin - Tablero
$router->get('/admin/tablero', [DashboardController::class, 'Index']);

// Rutas Admin - Ponentes
$router->get('/admin/ponentes', [PonentesController::class, 'Index']);
$router->get('/admin/ponentes/crear', [PonentesController::class, 'Crear']);
$router->post('/admin/ponentes/crear', [PonentesController::class, 'Crear']);
$router->get('/admin/ponentes/editar', [PonentesController::class, 'Editar']);
$router->post('/admin/ponentes/editar', [PonentesController::class, 'Editar']);
$router->post('/admin/ponentes/eliminar', [PonentesController::class, 'Eliminar']);

// Rutas Admin - Eventos
$router->get('/admin/eventos', [EventosController::class, 'Index']);
$router->get('/admin/eventos/crear', [EventosController::class, 'Crear']);
$router->post('/admin/eventos/crear', [EventosController::class, 'Crear']);
$router->get('/admin/eventos/editar', [EventosController::class, 'Editar']);
$router->post('/admin/eventos/editar', [EventosController::class, 'Editar']);
$router->post('/admin/eventos/eliminar', [EventosController::class, 'Eliminar']);

// Ruta API'S
$router->get('/api/eventos-horario', [APIEventoController::class, 'Index']);
$router->get('/api/ponentes', [APIPonenteController::class, 'Index']);
$router->get('/api/ponente', [APIPonenteController::class, 'Ponente']);
$router->get('/api/regalos', [APIRegalosController::class, 'Index']);

// Rutas Admin - usuarios Registrados
$router->get('/admin/usuarios-registrados', [RegistradosController::class, 'Index']);

// Rutas Admin - Regalos
$router->get('/admin/regalos', [RegalosController::class, 'Index']);

// Registros de Usuarios
$router->get('/finalizar-registro', [RegistroController::class, 'Crear']);
$router->post('/finalizar-registro/gratis', [RegistroController::class, 'Gratis']);
$router->post('/finalizar-registro/pagar', [RegistroController::class, 'Pagar']);
$router->get('/finalizar-registro/conferencias', [RegistroController::class, 'Conferencias']);
$router->post('/finalizar-registro/conferencias', [RegistroController::class, 'Conferencias']);

// Boleto Virtual
$router->get('/boleto', [RegistroController::class, 'Boleto']);

// Rutas Publicas
$router->get('/', [PaginasController::class, 'Index']);
$router->get('/devwebcamp', [PaginasController::class, 'Eventos']);
$router->get('/paquetes', [PaginasController::class, 'Paquetes']);
$router->get('/workshops-conferencias', [PaginasController::class, 'Conferencias']);
$router->get('/404', [PaginasController::class, 'Error']);

$router->comprobarRutas();
