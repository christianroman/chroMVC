<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Nueva persona</title>

        <link rel="stylesheet" type="text/css" href="public/css/style.css" />

        <link rel="stylesheet" href="public/css/smoothness/jquery.ui.all.css"> 
        <script src="public/js/jquery-1.5.1.js"></script> 
        <script src="public/js/jquery.ui.core.js"></script> 
        <script src="public/js/jquery.ui.widget.js"></script> 
        <script src="public/js/jquery.ui.datepicker.js"></script>
        <script src="public/js/jquery.ui.datepicker-es.js"></script>
        <script src="public/js/jquery.form.js"></script>

        <script>
            $(function() {
                $( "#datepicker" ).datepicker();
                
                
                $('#nuevaPersona').ajaxForm(function() {
                    alert("Persona agregada");
                });
                
                $('#estado').change(function(){
                    
                    val = $(this).val();
                    
                    $.post('controllers/municipios.php', { id: val }, function(data){
                        $('#municipio').html(data);
                    });
                    
                });
                
            });
        </script>

    </head>
                <body>

                    <fieldset>
                        <form action="controllers/submitpersona.php" method="post" name="nuevaPersona" id ="nuevaPersona" enctype="multipart/form-data">

                            <div>
                                <label for="nombre">Nombre(s):</label></br>
                                <input type="text" name="nombre"></input>
                            </div>

                            <div>
                                <label for="apellido">Apellido(s):</label></br>
                                <input type="text" name="apellido"></input>
                            </div>

                            <div>
                                <label for="fecnac">Fecha de nacimiento:</label></br>
                                <input type="text" name="fecnac" id="datepicker"></input>
                            </div>
                            
                            <h2>Direccion 1:</h2>
                            
                            <div>
                                <label for="linea1">Linea 1:</label></br>
                                <input type="text" name="linea1" id="linea1"></input>
                            </div>
                            
                            <div>
                                <label for="linea2">Linea 2:</label></br>
                                <input type="text" name="linea2" id="linea2"></input>
                            </div>
                            
                            
                            <div>
                                <label for="estado">Estado:</label>
                                <select name="estado" id="estado">

                                <?php
                                    require( SERVER_ROOT . '/models/estado.php');

                                    $estado = new estado;
                                    $estados = $estado->getAll();

                                    foreach($estados as $e){
                                        echo '<option value="' . $e->id_estado . '">' . $e->nombre . '</option>';
                                    }
                                ?>

                                </select>
                            </div>
                                
                            <div>
                                <label for="municipio">Municipio:</label>
                                
                                <select name="municipio" id="municipio">
                                    <option>Seleccione un estado</option>
                                </select>
                                
                            </div>
                            
                            <div>
                                <label for="cp">C.P:</label></br>
                                <input type="text" name="cp" maxlength="5" id="cp"></input>
                            </div>
                            
                            <div>
                                <label for="tipodireccion">Tipo dirección:</label>
                                <select name="tipodireccion" id="tipodireccion">

                                <?php
                                    require( SERVER_ROOT . '/models/tipodireccion.php');

                                    $tipodireccion = new tipodireccion;
                                    $tipodirecciones = $tipodireccion->getAll();

                                    foreach($tipodirecciones as $td){
                                        echo '<option value="' . $td->id_td . '">' . $td->nombre . '</option>';
                                    }
                                ?>

                                </select>
                            </div>
                            
                            <h2>Telefono 1:</h2>
                            
                            <div>
                                <label for="numero">Numero:</label></br>
                                <input type="text" name="numero" id="numero"></input>
                            </div>
                            
                            <div>
                                <label for="tipotelefono">Tipo teléfono:</label>
                                <select name="tipotelefono" id="tipotelefono">

                                <?php
                                    require( SERVER_ROOT . '/models/tipotelefono.php');

                                    $tipotelefono = new tipotelefono;
                                    $tipotelefonos = $tipotelefono->getAll();

                                    foreach($tipotelefonos as $t){
                                        echo '<option value="' . $t->id_tipo_telefono . '">' . $t->nombre . '</option>';
                                    }
                                ?>

                                </select>
                            </div>

                            <div>
                                <label for="nota">Nota:</label></br>
                                <textarea cols="60" rows="5" name="nota"></textarea>
                            </div>

                            <div>
                                <label for="foto">Cargar foto:</label></br>
                                <input type="file" name="foto"></input>
                            </div>

                            <div>
                                <input type="submit"></input>
                            </div>

                        </form>
                    </fieldset>

                </body>
                </html>
