<?php

namespace Model;

class Ponente extends ActiveRecord {
    protected static $tabla = 'ponentes';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'ciudad', 'pais', 'imagen', 'tags', 'redes'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->redes = $args['redes'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre del ponente es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido del ponente es Obligatorio';
        }
        if(!$this->ciudad) {
            self::$alertas['error'][] = 'La Ciudad del ponente es Obligatorio';
        }
        if(!$this->pais) {
            self::$alertas['error'][] = 'El País del ponente es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen del ponente es obligatoria';
        }
        if(!$this->tags) {
            self::$alertas['error'][] = 'Las areas de experiencia del ponente es obligatorio';
        }
    
        return self::$alertas;
    }

}
?>