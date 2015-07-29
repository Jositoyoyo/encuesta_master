<?php
class connectPDO {

    static function connect() {
        try {
            $PDO = new PDO('mysql:dbname=banco;host=localhost', 'root', 'jositoyoyo');
            return($PDO);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

}

class encuesta extends connectPDO 
{
    
    private $Id;
    private $navegador;
    private $pregunta;
    private $respuesta;
    
    function __construct($data) {

        $this->Id = @$data['id'];
        $this->navegador = @$data['navegador'];
        $this->pregunta =  @$data['pregunta'];
        $this->respuesta = @$data['respuesta'];
        
    }
    function insert() {       
        $pdo = connectPDO::connect();
        $pdo->exec("INSERT INTO preguntas (navegador, pregunta, respuesta)"
                . "VALUES ('$this->navegador', '$this->pregunta', '$this->respuesta')");
        return($pdo->lastInsertId());
    }
    function delete(){
        $pdo = connectPDO::connect();
        return($pdo->exec("DELETE FROM preguntas WHERE Id=$this->Id"));
        
    }
    function update(){
        $pdo = connectPDO::connect();
        return($pdo->exec("UPDATE preguntas "
                . "SET navegador = '$this->navegador', pregunta = '$this->pregunta', respuesta = '$this->respuesta' WHERE Id = $this->Id"));
    }
    /**
     * 
     * @return array object
     */
    public function find()
    {
        $pdo = connectPDO::connect();
        $result = $pdo->query("SELECT * FROM preguntas LIMIT 0, 30");
        return($result);
    }
    function get() 
    {
        $pdo = connectPDO::connect();
        $result = $pdo->query("SELECT * FROM preguntas WHERE Id=$this->Id");
        return($result);
    }
}

