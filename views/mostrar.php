<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

        <a href="index.php?personas&action=listar">Listar</a>
        
        <?php
            
            foreach($personas as $p){

        ?>
        
        <h1><?php echo $p->nombre . ' ' . $p->apellido; ?></h1>
        
        <img src="data/perfiles/<?php echo $p->foto; ?>">
        
        <h2>Fecha de nacimiento:</h2>
        <?php echo $p->fecnac; ?>
        
        <h2>Nota:</h2>
        <?php echo $p->nota; ?>
        
        <h2>Direccion:</h2>
        <?php $direcciones = $direcciones[0]; ?>
        <b>Linea 1:</b> <?php echo $direcciones->linea_1; ?></br>
        <b>Linea 2:</b> <?php echo $direcciones->linea_2; ?></br>
        <b>Municipio:</b> <?php echo $direcciones->municipio; ?></br>
        <b>Estado:</b> <?php echo $direcciones->estado; ?></br>
        <b>C.P:</b> <?php echo $direcciones->codigo_postal; ?></br>
        <b>Tipo de dirección:</b> <?php echo $direcciones->tipo; ?></br>
        
        <h2>Teléfono:</h2>
        <?php $telefonos = $telefonos[0]; ?>
        <b>Numero:</b> <?php echo $telefonos->numero; ?></br>
        <b>Tipo de teléfono:</b> <?php echo $telefonos->tipo; ?></br>
        
        <?php } ?>
        
    </body>
</html>
