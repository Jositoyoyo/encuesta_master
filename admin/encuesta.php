<?php

include_once '../common/connectPDO.php';

/**
 * Esta clase sirve de modelo
 *
 * @category   modulos
 * @package    encuesta_master
 * @copyright  Copyright (c) 2015 Jositoyoyo Technologies Spain Inc. 
 * @license    BSD License
 * @version    Release: 1.0
 * @link       
 * @since      Agosto 2015
 * 
 */
class encuesta extends connectPDO {

    private $Id;
    private $navegador;
    private $pregunta;
    private $respuesta;

    /**
     * Clase constructora, recoge los datos de la peticion GET
     * @param array $data
     */
    function __construct($data)
    {
        $this->Id = @$data['id'];
        $this->navegador = @$data['navegador'];
        $this->pregunta = @$data['pregunta'];
        $this->respuesta = @$data['respuesta'];
    }

    /**
     * Insertamos datos en BD
     * @return int
     */
    function insert() {
        $pdo = connectPDO::connect();
        $pdo->exec(
                "INSERT INTO 
                preguntas (navegador, pregunta, respuesta) 
                VALUES ('$this->navegador', '$this->pregunta', '$this->respuesta')");
        return($pdo->lastInsertId());
    }

    /**
     * Borramos datos de Bd
     * @return int
     */
    function delete()
    {
        try {
            $pdo = connectPDO::connect();
            return($pdo->exec("DELETE FROM preguntas WHERE Id=$this->Id"));
        } catch (Exception $e) {
            error_log($e->getMessage(),0);
        }
    }

    /**
     * 
     * @return array
     */
    function update() {
        $pdo = connectPDO::connect();
        return($pdo->exec(
                        "UPDATE preguntas SET 
                navegador = '$this->navegador', 
                pregunta = '$this->pregunta', 
                respuesta = '$this->respuesta'
                WHERE Id = $this->Id"));
    }

    /**
     * 
     * @return array object
     */
    public function find() {
        $pdo = connectPDO::connect();
        $result = $pdo->query("SELECT * FROM preguntas LIMIT 0, 30");
        return($result);
    }

    function get() {
        $pdo = connectPDO::connect();
        $result = $pdo->query("SELECT * FROM preguntas WHERE Id=$this->Id");
        return($result);
    }

}
