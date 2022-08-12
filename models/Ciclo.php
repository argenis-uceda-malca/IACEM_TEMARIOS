<?php 

namespace Model;

class Ciclo extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'ciclo';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';

    }
}