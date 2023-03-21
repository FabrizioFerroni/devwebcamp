<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Ponente;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController
{
   public static function Index(Router $router)
   {
      if(!is_admin()){
         header('Location: /iniciarsesion');
      }

      $pagina_actual = $_GET['pagina'] ?? 1;
      $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT); 
      if(!$pagina_actual || $pagina_actual < 1){
         header('Location:/admin/ponentes');
      }
      
      $registro_por_pagina = 10;
      $total = Ponente::total();

      $paginacion = new Paginacion($pagina_actual, $registro_por_pagina, $total);
         
      if($paginacion->total_paginas() < $pagina_actual) header('Location:/admin/ponentes');

   
      $ponentes = Ponente::paginar($registro_por_pagina, $paginacion->offset());
      $router->render('admin/ponentes/index', [
         'titulo' => 'Ponentes',
         'nombre' => $_SESSION['nombre'],
         'ponentes' => $ponentes,
         'paginacion' => $paginacion->paginacion()
      ]);
   }

   public static function Crear(Router $router)
   {
      $alertas = [];
      if(!is_admin()){
         header('Location: /iniciarsesion');
      }
      $ponente = new Ponente;

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         // Leer imagen
         if (!empty($_FILES['imagen']['tmp_name'])) {
            $carpeta_img = '../public/img/speakers';
            if (!is_dir($carpeta_img)) {
               mkdir($carpeta_img, 0777, true);
            }
            $img_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
            $img_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);
            $nombre_img = md5(uniqid(rand(), true));

            $_POST['imagen'] = $nombre_img;
         }

         $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

         $ponente->sincronizar($_POST);
         $alertas = $ponente->validar();

         if (empty($alertas)) {
            // Guardar la imagen
            $img_png->save($carpeta_img . '/' . $nombre_img . '.png');
            $img_webp->save($carpeta_img . '/' . $nombre_img . '.webp');

            // Guardar en la bd
            $resultado = $ponente->guardar();

            if ($resultado) {
               header('Location:/admin/ponentes');
            }
         }
      }
      $alertas = Ponente::getAlertas();
      $router->render('admin/ponentes/crear', [
         'titulo' => 'Agregar nuevo ponente',
         'alertas' => $alertas,
         'nombre' => $_SESSION['nombre'],
         'ponente' => $ponente,
         'redes' => json_decode($ponente->redes)
      ]);
   }

   public static function Editar(Router $router)
   {
      $alertas = [];
      if(!is_admin()){
         header('Location: /iniciarsesion');
      }
      $id = $_GET['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);
      if (!$id) header('Location: /admin/ponentes');

      $ponente = Ponente::find($id);
      if (!$ponente) header('Location: /admin/ponentes');

      $ponente->imagen_actual = $ponente->imagen;
      $redes = json_decode($ponente->redes);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         // Leer imagen
         if (!empty($_FILES['imagen']['tmp_name'])) {
            $carpeta_img = '../public/img/speakers';
            if (!is_dir($carpeta_img)) {
               mkdir($carpeta_img, 0777, true);
            }
            $img_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
            $img_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);
            $nombre_img = md5(uniqid(rand(), true));

            $_POST['imagen'] = $nombre_img;
         } else {
            $_POST['imagen'] = $ponente->imagen_actual;
         }
         $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
         $ponente->sincronizar($_POST);
         $alertas = $ponente->validar();
         if (empty($alertas)) {
            if (isset($nombre_img)) {
               // Guardar la imagen
               $img_png->save($carpeta_img . '/' . $nombre_img . '.png');
               $img_webp->save($carpeta_img . '/' . $nombre_img . '.webp');
            }

            $resultado = $ponente->guardar();

            if ($resultado) {
               header('Location:/admin/ponentes');
            }
         }
      }
      $alertas = Ponente::getAlertas();
      $router->render('admin/ponentes/editar', [
         'titulo' => 'Editar ponente',
         'alertas' => $alertas,
         'nombre' => $_SESSION['nombre'],
         'ponente' => $ponente,
         'redes' => $redes
      ]);
   }

   public static function Eliminar()
   {
      if(!is_admin()){
         header('Location: /iniciarsesion');
      }
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $id = $_POST['id'];
         $id = filter_var($id, FILTER_VALIDATE_INT);
         if (!$id) header('Location: /admin/ponentes');

         $ponente = Ponente::find($id);
         if (!$ponente) header('Location: /admin/ponentes');

         $resultado = $ponente->eliminar();
         if($resultado){
            header('Location: /admin/ponentes');
         }
      }
   }
}
