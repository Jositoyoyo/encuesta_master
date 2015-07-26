<?php
/**
 * @author John Doe <john.doe@example.com>
 */
include_once 'pregunta.php';
include_once 'respuesta.php';
include_once 'cliente.php';
include_once 'sistema.php';

abstract class index 
{
    /**
     * Esta funcion ejecutara la app y hara las veces de controlador
     */
    static function run()
    {
        $pregunta = new encuesta();
        @$action = $_POST['action'];
        
        if($action == 'respuesta'){
            $encuesta->saverespuesta();          
        }else{
            echo $pregunta->Form();
        }
        
    }
    
}

index::run();

