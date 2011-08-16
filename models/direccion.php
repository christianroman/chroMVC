<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of direccion
 *
 * @author Christian Roman
 */
class direccion {
    
    private $linea1;
    private $linea2;
    private $municipio;
    private $estado;
    private $codigoPostal;

    function __construct($linea1, $linea2, $municipio, $estado, $codigoPostal) {
        $this->linea1 = $linea1;
        $this->linea2 = $linea2;
        $this->municipio = $municipio;
        $this->estado = $estado;
        $this->codigoPostal = $codigoPostal;
    }

    public function getLinea1() {
        return $this->linea1;
    }

    public function setLinea1($linea1) {
        $this->linea1 = $linea1;
    }

    public function getLinea2() {
        return $this->linea2;
    }

    public function setLinea2($linea2) {
        $this->linea2 = $linea2;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getCodigoPostal() {
        return $this->codigoPostal;
    }

    public function setCodigoPostal($codigoPostal) {
        $this->codigoPostal = $codigoPostal;
    }

}
?>
