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

        <a href="index.php?personas&action=agregar">Agregar nuevo</a>

        <table>

            <tr>
                <td>Nombre(s)</td>
                <td>Apellidos(s)</td>
                <td>Fecha de nacimiento</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>

            <?php
            foreach ($personas as $p) {

                echo '<tr>';

                echo '<td><a href="index.php?personas&action=mostrar&id=' . $p->id_persona . '">' . $p->nombre . '</td>';
                echo '<td>' . $p->apellido . '</td>';
                echo '<td>' . $p->fecnac . '</td>';
                echo '<td><a href="index.php?personas&action=modificar&id=' . $p->id_persona . '">Editar</a></td>';
                echo '<td><a href="index.php?personas&action=eliminar&id=' . $p->id_persona . '">Eliminar</a></td>';

                echo '<tr>';
            }
            ?>

        </table>

    </body>
</html>
