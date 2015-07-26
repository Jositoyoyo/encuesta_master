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
