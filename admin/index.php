<?php
    /**
    * Short description for file
    *
    * Long description for file (if any)...
    *
    * LICENSE: Some license information
    *
    * @category   Zend
    * @package    Zend_Magic
    * @subpackage Wand
    * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
    * @license    http://framework.zend.com/license   BSD License
    * @version    $Id:$
    * @link       http://framework.zend.com/package/PackageName
    * @since      File available since Release 1.5.0
    */

include_once 'controller.php';
/**
 * Esta clase carga el controlador 
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
class admin
{
    function exec() 
    {
        
        $controller = new controller();
    }

}
// inciamos la aplicacion
$admin = new admin();
$admin->exec();
