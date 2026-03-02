<?php
//MODELO 
require_once(__DIR__."/../sistema.class.php");
class Empleado extends Sistema{
    function leer(){
        $this -> conectar();
        $sql = "select * from empleado";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $empleados;
    }
    function leerUno($id_empleado){
        $this -> conectar();
        $sql = "select * from empleado where id_empleado = :id_empleado ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_empleado",$id_empleado, PDO::PARAM_INT); 
        $stmt->execute();
        $empleados = $stmt->fetch(PDO::FETCH_ASSOC);
        //el fetchAll regresa un arreglo bidimensional
        //fetch solo regresa 1
        return $empleados;
    }
    //manda información a traves de un array
    function crear($data){
        $this -> conectar();
        $sql = "insert into empleado(nombre) values (:nombre)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nombre",$data['nombre'], PDO::PARAM_STR); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function actualizar($id_empleado, $data){
        $this -> conectar();
        $sql = "update empleado set nombre = :nombre where id_empleado = :id_empleado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nombre",$data['nombre'], PDO::PARAM_STR); 
        $stmt->bindParam(":id_empleado",$id_empleado, PDO::PARAM_INT); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function borrar($id_empleado){
        $this -> conectar();
        $sql = "delete from empleado where id_empleado = :id_empleado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_empleado",$id_empleado, PDO::PARAM_INT); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
};
?>