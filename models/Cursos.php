<?php 

namespace Model;

class Cursos extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'cursos';
    protected static $columnasDB = ['id', 'nombre', 'idCiclo'];

    public $id;
    public $nombre;
    public $idCiclo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->idCiclo = $args['idCiclo'] ?? '';

    }
}