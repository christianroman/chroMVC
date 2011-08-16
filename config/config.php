<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//server
define('APP_NAME', "Directorio");
define('SERVER_ROOT', realpath(dirname('../')));

//database
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "root");
define('DB_DATABASE', "directorio");

// website
define('WEBSITE_DIR', 'directorio');
define('CONFIG_DIR', WEBSITE_DIR . "/config/");
define('LOG_DIR', WEBSITE_DIR . "/log/");
define('CACHE_DIR', WEBSITE_DIR . "cache/");
define('UPLOADS_DIR', WEBSITE_DIR . "/uploads/");
define('JAVASCRIPT_DIR', WEBSITE_DIR . "/js/");
define('CSS_DIR', WEBSITE_DIR . "/css/" );

// application folders

define('APPLICATION_DIR',          "$application/" );
define('CONTROLLERS_DIR',          "$application/controllers/" );
define('MODELS_DIR',               "$application/models/" );
define('VIEWS_DIR',                "$application/views/" );
define('APPLICATION_LIBRARY_DIR',  "$application/library/" );

?>
