<?php

$request = $_SERVER['QUERY_STRING'];

//Obtiene la pagina solicitada y las otras variables GET
$parsed = explode('&', $request);

//Obtiene la pagina, el primer elemento
$page = array_shift($parsed);

//El resto de arreglo son parametros tipo GET
$getVars = array();

foreach ($parsed as $argument) {
    //Separa las variables GET valores y parametros.
    list($variable, $value) = explode('=', $argument);
    $getVars[$variable] = $value;
}

//obtiene el archivo del controlador
$target = SERVER_ROOT . '/controllers/' . $page . '.php';

//Comprueba que realmente existe el controlador de la peticion
if (file_exists($target)) {
    include_once($target);

    if (class_exists($page)) {
        $controller = new $page;
    } else {
        //Si la clase no coincide con la pagina solcitada
        die('La clase no existe!');
    }
} else {
    //Si el archivo no se encuentra en controllers 
    die("La pagina no existe");
}

//Una vez instancia en controllador solicitado, enviamos las variables y valores GET obtenidas.
$controller->main($getVars);

//Automaticamente incluye la clase de los archivos de la pagina solicitada
function __autoload($page)
{
    //Obtiene el archivo
    $file = SERVER_ROOT . '/models/' . strtolower($page) . '.php';

    //comprueba si existe
    if (file_exists($file))
    {
        //Incluye el archivo del modelo
        include_once($file);
    }
    else
    {
        //El archivo no existe
        die("El archivo '$file' no se encuentra.");
    }
}


?>
