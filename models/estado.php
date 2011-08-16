<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estado
 *
 * @author Christian Roman Mendoza <chroman16@gmail.com>
 */
class estado {
    
    private $db;
    
    function __construct() {
        $this->db = new Mysql;
    }
    
    public function getAll(){
        $this->db->conectar();
        $this->db->consulta("SELECT * FROM estado");
        return $this->db->fetch();
    }
    
}

?>
