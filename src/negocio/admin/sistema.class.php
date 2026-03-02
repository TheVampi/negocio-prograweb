<?php
#construye la ruta absoluta
require_once(__DIR__."/config.php");
class Sistema{
    #metodo encargado de conectarme a la base de datos
    #solo se pone var cuando esta dentro de una clase
    var $db;
    function conectar(){
        $this->db = new PDO(DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASSWORD);
    }
    function alerta($tipo,$mensaje){
        if (!is_null($tipo)&& !is_null($mensaje)){
            $alerta = array();
            $alerta['tipo']=$tipo;
            $alerta['mensaje']=$mensaje;
            include(__DIR__."/views/alerta.php");
        }
    }
};
?>