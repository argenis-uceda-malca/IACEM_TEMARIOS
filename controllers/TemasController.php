<?php

namespace Controllers;


use Model\Temas;
use MVC\Router;

class TemasController
{
    public static function viewtema(Router $router)
    {
        session_start();
        isAuth();

        $tema = Temas::all();

        $router->renderAdmin('home/viewtema', [
            'tema' => $tema
        ]);
    }

    public static function addEditartema(Router $router)
    {
        session_start();
        isAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tema = new Temas($_POST);
            
            $resultado = $tema->guardar();

            if ($resultado) {
                $respuesta = array(
                    'resultado' => 'exito',
                    'curso' => $_POST['idcurso'],
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

    public static function eliminartema(){
        session_start();
        isAuth();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $producto = Temas::find($id);
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
