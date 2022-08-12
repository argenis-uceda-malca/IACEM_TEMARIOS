<?php

namespace Controllers;

use Model\Ciclo;
use Model\Cursos;
use Model\Temas;
use Model\Usuario;
use MVC\Router;

class CicloController
{
    public static function viewciclo(Router $router)
    {
        session_start();
        isAuth();

        $ciclos = Ciclo::all();
        $cursos = Cursos::all();
        $temas = Temas::all();

        $router->renderAdmin('panel/viewCiclos', [
            'ciclos' => $ciclos,
            'cursos' => $cursos,
        ]);
    }

    public static function addEditarCiclo(Router $router)
    {
        session_start();
        isAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ciclo = new Ciclo($_POST);
            
            $resultado = $ciclo->guardar();

            if ($resultado) {
                $respuesta = array(
                    'resultado' => 'exito',
                    'ciclos' => $ciclo,
                    'post' => $_POST
                );
            } else {
                $respuesta = array(
                    'resultado' => 'error'
                );
            }
        }
        die(json_encode($respuesta));
    }

    public static function eliminarciclo(){
        session_start();
        isAuth();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $producto = Ciclo::find($id);
            $producto->eliminar();
            $respuesta = array(
                'resultado' => 'exito',
                'id_eliminado' => $id,
                'id' => $id
            );

        }
        die(json_encode($respuesta));
    }
    
}
