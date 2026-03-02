
<?php
//MODELO 
require_once(__DIR__."/../sistema.class.php");
class Estado extends Sistema{
    function leer(){
        $this -> conectar();
        $sql = "select * from estado";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $estados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $estados;
    }
    function leerUno($id_estado){
        $this -> conectar();
        $sql = "select * from estado where id_estado = :id_estado ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_estado",$id_estado, PDO::PARAM_INT); 
        $stmt->execute();
        $estados = $stmt->fetch(PDO::FETCH_ASSOC);
        //el fetchAll regresa un arreglo bidimensional
        //fetch solo regresa 1
        return $estados;
    }
    //manda información a traves de un array
    function crear($data){
        $this -> conectar();
        $sql = "insert into estado(estado) values (:estado)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":estado",$data['estado'], PDO::PARAM_STR); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function actualizar($id_estado, $data){
        $this -> conectar();
        $sql = "update estado set estado = :estado where id_estado = :id_estado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":estado",$data['estado'], PDO::PARAM_STR); 
        $stmt->bindParam(":id_estado",$id_estado, PDO::PARAM_INT); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function borrar($id_estado){
        $this -> conectar();
        $sql = "delete from estado where id_estado = :id_estado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_estado",$id_estado, PDO::PARAM_INT); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
};
?>