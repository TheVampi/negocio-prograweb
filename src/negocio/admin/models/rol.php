
<?php
//MODELO 
require_once(__DIR__."/../sistema.class.php");
class Rol extends Sistema{
    function leer(){
        $this -> conectar();
        $sql = "select * from rol";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $roles;
    }
    function leerUno($id_rol){
        $this -> conectar();
        $sql = "select * from rol where id_rol = :id_rol ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_rol",$id_rol, PDO::PARAM_INT); 
        $stmt->execute();
        $roles = $stmt->fetch(PDO::FETCH_ASSOC);
        //el fetchAll regresa un arreglo bidimensional
        //fetch solo regresa 1
        return $roles;
    }
    //manda información a traves de un array
    function crear($data){
        $this -> conectar();
        $sql = "insert into rol(rol) values (:rol)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":rol",$data['rol'], PDO::PARAM_STR); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function actualizar($id_rol, $data){
        $this -> conectar();
        $sql = "update rol set rol = :rol where id_rol = :id_rol";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":rol",$data['rol'], PDO::PARAM_STR); 
        $stmt->bindParam(":id_rol",$id_rol, PDO::PARAM_INT); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function borrar($id_rol){
        $this -> conectar();
        $sql = "delete from rol where id_rol = :id_rol";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_rol",$id_rol, PDO::PARAM_INT); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
};
?>