<?php 

namespace Model;

class Temas extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'temas';
    protected static $columnasDB = ['id','idcurso', 'nombre'];

    public $id;
    public $idcurso;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idcurso = $args['idcurso'] ?? '';
        $this->nombre = $args['nombre'] ?? '';

    }
}