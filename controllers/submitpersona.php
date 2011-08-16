<?php

require('../inc/Mysql.php');
require('../inc/functions.php');

if (isset($_POST)) {
    require_once('../config/config.php');
    require_once('../models/persona.php');

    //Variables de los datos de la persona
    $nombre = cleanuserinput($_POST['nombre']);
    $apellido = cleanuserinput($_POST['apellido']);
    $fecnac = cleanuserinput($_POST['fecnac']);
    $nota = cleanuserinput($_POST['nota']);

    $fecnac = str_replace('/', '-', $fecnac);
    $fecnac = explode('-', $fecnac);
    $fecha = $fecnac[2] . '-' . $fecnac[1] . '-' . $fecnac[0];

    $persona = new persona;

    $filename = $persona->getLastId('persona');
    $id_persona = $filename;
    
    // variables de direccion
    $linea1 = cleanuserinput($_POST['linea1']);
    $linea2 = cleanuserinput($_POST['linea2']);
    $id_municipio = cleanuserinput($_POST['municipio']);
    $id_estado = cleanuserinput($_POST['estado']);
    $cp = cleanuserinput($_POST['cp']);
    $id_tipo = cleanuserinput($_POST['tipodireccion']);
    
    $id_direccion = $persona->getLastId('direccion');
    $persona->nuevaDireccion($linea1, $linea2, $id_municipio, $id_estado, $cp);
    
    // Agregar los datos de la relacion direccion_persona
    $persona->nuevaDireccionPersona($id_persona, $id_direccion, $id_tipo);
    
    //Variables de telefono
    $numero = cleanuserinput($_POST['numero']);
    $id_tipo_telefono = cleanuserinput($_POST['tipotelefono']);
    
    $persona->nuevoTelefono($id_persona, $numero, $id_tipo_telefono);
    
    //Subir y obtener la extension de la imagen, asignarle el nombre con respecto al id de la persona
    $ext = explode('image/', $_FILES["foto"]["type"]);
    $filename = $filename . '.' . $ext[1];

    copy($_FILES['foto']['tmp_name'], '../data/perfiles/' . $filename);
    
    
    if (file_exists('../data/perfiles/' . $filename)) {
        $persona->nuevaPersona($nombre, $apellido, $fecha, $nota, $filename);
    }
}
?>
