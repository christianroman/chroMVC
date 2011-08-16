<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of municipio
 *
 * @author Christian Roman Mendoza <chroman16@gmail.com>
 */
class municipio {
    
    private $db;
    
    function __construct() {
        $this->db = new Mysql;
    }
    
    public function getAll(){
        $this->db->conectar();
        $this->db->consulta("SELECT * FROM municipio");
        return $this->db->fetch();
    }
    
    public function getByIdEstado($id){
        $this->db->conectar();
        $this->db->consulta('SELECT * FROM municipio WHERE id_estado = ' . $id);
        return $this->db->fetch();
    }
    
}

?>
