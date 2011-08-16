<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of telefono
 *
 * @author Christian Roman
 */

class tipotelefono {
    
    private $db;
    
    function __construct() {
        $this->db = new Mysql;
    }
    
    public function getAll(){
        $this->db->conectar();
        $this->db->consulta("SELECT * FROM tipo_telefono");
        return $this->db->fetch();
    }
    
}

?>
