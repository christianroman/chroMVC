<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipodireccion
 *
 * @author Christian Roman Mendoza <chroman16@gmail.com>
 */
class tipodireccion {
    
    private $db;
    
    function __construct() {
        $this->db = new Mysql;
    }
    
    public function getAll(){
        $this->db->conectar();
        $this->db->consulta("SELECT * FROM tipo_direccion");
        return $this->db->fetch();
    }
    
}

?>
