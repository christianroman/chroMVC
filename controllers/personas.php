<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of personas
 *
 * @author christian
 */
require(SERVER_ROOT . '/inc/Mysql.php');

class personas {

    public $view = 'personas';

    public function main(array $getVars) {

        $action = $getVars['action'];

        switch ($action) {
            case 'listar': $this->listar();
                break;

            case 'agregar': $this->agregar();
                break;

            case 'mostrar':
                $id = $getVars['id'];
                $this->mostrar($id);
                break;

            case 'modificar':
                $id = $getVars['id'];
                $this->modificar($id);
                break;

            case 'eliminar':
                $id = $getVars['id'];
                $this->eliminar($id);
                break;

            default:
                $this->listar();
                break;
        }
    }

    public function listar() {
        require( SERVER_ROOT . '/models/persona.php');

        $persona = new persona;
        $personas = $persona->findAll();

        require( SERVER_ROOT . '/views/listar.php' );
    }

    public function modificar($id) {

        require( SERVER_ROOT . '/models/persona.php');
        require_once(SERVER_ROOT . '/views/modificar.php');
    }

    public function mostrar($id) {
        
        require( SERVER_ROOT . '/models/persona.php');

        $persona = new persona;
        $personas = $persona->findById($id);
        $direcciones = $persona->getDireccion($id);
        $telefonos = $persona->getTelefono($id);
        
        require_once(SERVER_ROOT . '/views/mostrar.php');
        
    }

    public function agregar() {
        
        require( SERVER_ROOT . '/views/agregar.php' );
        
    }

}

?>