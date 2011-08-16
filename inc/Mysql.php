<?php

/**
 * Description of MySql
 *
 * @author Christian Roman
 */
class Mysql {

    private $db_conexion;
    private $db_host;
    private $db_usuario;
    private $db_pass;
    private $db_nombre;
    private $db;
    private $resultado;
    private $sql;
    private $filas = 0;
    private $ultimoid = 0;
    private $filas_afectadas = 0;
    private static $instancia;

    function __construct() {
        $this->db_host = DB_HOST;
        $this->db_usuario = DB_USER;
        $this->db_pass = DB_PASSWORD;
        $this->db_nombre = DB_DATABASE;
    }

    public static function getInstance() {
        if (!isset(self::$instancia)) {
            self::$instancia = new Mysql();
        }
        return self::$instancia;
    }

    public function conectar() {
        $this->db_conexion = mysql_connect($this->db_host, $this->db_usuario, $this->db_pass) or die("Conexion al servidor fallida");
        $this->db = mysql_select_db($this->db_nombre, $this->db_conexion) or die("No existe la base de datos");
    }

    public function consulta($sql) {
        if ($this->db_conexion) {
            $sql = trim($sql);
            //$sql = mysql_escape_string($string);
            $this->resultado = mysql_query($sql, $this->db_conexion) or die(mysql_error($this->db_conexion));

            if ($this->resultado) {
                $this->filas_afectadas = mysql_affected_rows($this->db_conexion);
                if (is_resource($this->resultado)) {
                    $this->filas = mysql_num_rows($this->resultado);
                } else {
                    $this->filas = 0;
                }

                $this->ultimo_id = mysql_insert_id($this->db_conexion);
                return true;
            } else {
                $this->filas_afectadas = 0;
                $this->filas = 0;
                return false;
            }
        } else {
            $this->filas_afectadas = 0;
            $this->filas = 0;
            return false;
        }
    }

    public function fetch() {
        if ($this->filas > 0) {
            $array = array();
            while ($row = mysql_fetch_object($this->resultado))
                $array[] = $row;
            return $array;
        }
        else
            return false;
    }

    public function ultimoRegistro($tabla) {
        $this->consulta("SELECT auto_increment as id FROM information_schema.tables WHERE table_name = '$tabla' LIMIT 1");
        return mysql_fetch_object($this->resultado);
    }

    public function numeroFilas() {
        return $this->filas;
    }

    public function tieneRegistros($tabla) {
        $tabla = trim($tabla);
        $this->consulta("SELECT * FROM $tabla");
        if ($this->filas() > 0)
            return true;
        return false;
    }

    function escape($str) {
        $str = stripslashes($str);
        $str = mysql_real_escape_string($str);
        return $str;
    }

}

?>