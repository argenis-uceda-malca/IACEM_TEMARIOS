<?php

namespace Controllers;


use Model\Ciclo;
use Model\Cursos;
use Model\Temas;
use Model\Usuario;
use MVC\Router;

class CursoController
{
    public static function viewcurso(Router $router)
    {
        session_start();
        isAuth();
        $idCurso = $_GET['curso'];

        $ciclos = Ciclo::all();
        $cursos = Cursos::all();

        $consulta = "SELECT * FROM temas where idcurso=".$idCurso;
        $temas = Temas::SQL($consulta);

        //debuguear($temas);

        $router->renderAdmin('panel/viewCursos', [
            'ciclos' => $ciclos,
            'cursos' => $cursos,
            'temas' => $temas,
            'idCurso' => $idCurso,
        ]);
    }

    public static function addEditarCurso(Router $router)
    {
        session_start();
        isAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $curso = new Cursos($_POST);
            
            $resultado = $curso->guardar();
            
            if ($resultado) {
                $respuesta = array(
                    'resultado' => 'exito',
                    'post' => $curso,
                    'ciclo' => $_POST['idCiclo'],
                );
            } else {
                $respuesta = array(
                    'resultado' => 'error'
                );
            }
        }
        die(json_encode($respuesta));
    }

    public static function eliminarcurso(){
        session_start();
        isAuth();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $producto = Cursos::find($id);
            $producto->eliminar();
            $respuesta = array(
                'resultado' => 'exito',
                'id_eliminado' => $id,
                'id' => $id
            );

        }
        die(json_encode($respuesta));
    }

    public static function admincurso(Router $router)
    {
        session_start();
        isAuth();
        $idCiclo = $_GET['ciclo'];

        $ciclos = Ciclo::all();
        $cursos = Cursos::all();

        $consulta = "SELECT * FROM temas where idcurso=".$idCiclo;
        $temas = Temas::SQL($consulta);

        //debuguear($temas);

        $router->renderAdmin('panel/admincurso', [
            'ciclos' => $ciclos,
            'cursos' => $cursos,
            'idCiclo' => $idCiclo,
        ]);
    }
    
}
