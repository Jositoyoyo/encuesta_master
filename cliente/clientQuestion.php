<?php

class encuesta {
    
    private $Id;
    private $navegador;
    private $pregunta;
    private $respuesta;
    /**
     * Nos devuelve el navegador que usa el cliente
     * @return string 
     */
    function ClientBrowser() {

        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $this->navegador = 'Unknown';

        if (preg_match('/Firefox/i', $u_agent)) {
            $this->navegador = 'Firefox';
        }
        return($this->navegador);
    }
    /**
     * Mostramos el formulario con la pregunta y las opciones disponibles
     * @return string
     */
    function Form() {
        
        $html = '<form action="index.php" method="POST">
                <p>Prefieres usar Mozilla o explorer?</p>
                Mozilla<input type="radio" value="Mozilla"/>
                Internet<input type="radio" value="Explorer"/>
                <button>Reponder</button>
            </form>';
        return($html);
    }

    /**
     * Encuesta sobre los navegadores
     * @return  boolean
     */
    function getPregunta() {
        $pdo = new PDO('', 'root', 'jositoyoyo');
        $pdo->exec('');
    }

}
