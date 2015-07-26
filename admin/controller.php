<?php

include_once 'encuesta.php';

class controller {

    function __construct() {
        $data = isset($_REQUEST) ? $_REQUEST : '';
        switch (@$data['action']) {
            case 'insert':
                $this->insert($data);
                break;
            case 'update':
                $this->update($data);
                break;
            case 'delete':
                $this->delete($data);
                break;
            default:
                $this->view('formulario', $data);
                break;
        }
    }

    function insert($data) {
        $pregunta = new encuesta($data);
        if ($pregunta->insert() != '0') {
            echo 'Exito al insertar los datos';
            $this->view('formulario', null);
        } else {
            echo 'Fallo al insertar los datos';
            $this->view('formulario', null);
        }
    }

    function delete($data) {
        $pregunta = new encuesta($data);
        $pregunta->delete();
        $this->view('formulario', null);
    }

    function update($data) {
        $pregunta = new encuesta($data);
        $pregunta->update();
        $this->view('formulario', null);
    }

    function view($plantilla, $data = null) {
        include_once $plantilla . '.php';
    }

}
