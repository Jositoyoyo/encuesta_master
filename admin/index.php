<?php
/**
 * Un sencillo sistema para editar preguntas
 * 
 * @access public
 * @author John Doe <john.doe@example.com>
 * @copyright (c) year, John Doe
 * @since 
 * @version string
 */

include_once 'controller.php';

class admin {

    function exec() {
        
        $controller = new controller();
    }

}

$admin = new admin();
$admin->exec();

