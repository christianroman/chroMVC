<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of persona
 *
 * @author Christian Roman
 */
class persona {

    private $db;

    function __construct() {
        $this->db = new Mysql;
    }

    function findAll() {

        $this->db->conectar();
        $this->db->consulta("SELECT * FROM persona");
        return $this->db->fetch();
    }

    function findByName($getVars) {
        $this->db->conectar();
        $this->db->consulta("SELECT * FROM persona WHERE persona.nombre like '%$getVars%'");
        return $this->db->fetch();
    }
    
    function findById($id){
        $this->db->conectar();
        $this->db->consulta("SELECT * FROM persona WHERE id_persona = $id");
        return $this->db->fetch();
    }
    
    function nuevaPersona($nombre, $apellido, $fecha, $nota, $foto){
        $this->db->conectar();
        $this->db->consulta('INSERT INTO persona (nombre, apellido, fecnac, nota, foto) values ("' . $nombre . '","' . $apellido . '","' . $fecha . '","' . $nota . '","' . $foto . '")');
    }
    
    function nuevaDireccion($linea1, $linea2, $id_municipio, $id_estado, $cp){
        $this->db->conectar();
        $this->db->consulta('INSERT INTO direccion (linea_1, linea_2, id_municipio, id_estado, codigo_postal) values ("' . $linea1 . '","' . $linea2 . '",' . $id_municipio . ',' .  $id_estado . ',' . $cp . ')');
    }
    
    function nuevaDireccionPersona($id_persona, $id_direccion, $id_tipo){
        $this->db->conectar();
        $this->db->consulta( 'INSERT INTO direccion_persona (id_persona, id_direccion, id_tipo) values (' . $id_persona . ',' . $id_direccion . ',' . $id_tipo . ')' );
    }
    
    function nuevoTelefono($id_persona, $numero, $id_tipo_telefono){
        $this->db->conectar();
        $this->db->consulta( 'INSERT INTO telefono_persona (id_persona, numero, id_tipo_telefono) values (' . $id_persona . ',' . $numero . ',' . $id_tipo_telefono . ')' );
    }
    
    function getDireccion($id){
        $this->db->conectar();
        $this->db->consulta("select linea_1, linea_2, (select nombre from municipio where municipio.id_municipio = direccion.id_municipio) as municipio, (select nombre from estado where estado.id_estado = direccion.id_estado) as estado, codigo_postal, (select nombre from tipo_direccion where tipo_direccion.id_td = direccion_persona.id_tipo) as tipo from direccion, direccion_persona where direccion.id_direccion = direccion_persona.id_direccion and id_persona = $id");
        return $this->db->fetch();
    }
    
    function getTelefono($id){
        $this->db->conectar();
        $this->db->consulta("select numero, (select nombre from tipo_telefono where tipo_telefono.id_tipo_telefono = telefono_persona.id_tipo_telefono) as tipo from telefono_persona where id_persona = $id");
        return $this->db->fetch();
    }
    
    function eliminar($id){
        $this->db->conectar();
        $this->db->consulta("DELETE FROM persona where id_persona = $id");
        $this->db->consulta("DELETE FROM telefono_persona where id_persona = $id");
        $this->db->consulta("DELETE FROM direccion_persona where id_persona = $id");
    }
    

    public function getLastId($table) {
        $this->db->conectar();
        $id = $this->db->ultimoRegistro($table);
        return $id->id;
    }

}

?>
