<?php

if (isset($_POST)) {

    require('../inc/Mysql.php');
    require('../inc/functions.php');
    require_once('../config/config.php');
    require_once('../models/municipio.php');

    $id = cleanuserinput($_POST['id']);

    $municipio = new municipio;

    $municipios = $municipio->getByIdEstado($id);

    foreach ($municipios as $m) {
        echo '<option value="' . $m->id_municipio . '">' . $m->nombre . '</option>';
    }
}

?>
