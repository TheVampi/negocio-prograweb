<?php
//MODELO 
require_once(__DIR__."/../sistema.class.php");
class Municipio extends Sistema { 
    function leer(){
        $this -> conectar();
        $sql = "select m.*, e.estado 
                from municipio m 
                join estado e on m.id_estado = e.id_estado";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $municipios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $municipios;
    }
    
    function leerUno($id_municipio){
        $this -> conectar();
        $sql = "select m.*, e.estado 
                from municipio m 
                join estado e on m.id_estado = e.id_estado 
                where m.id_municipio = :id_municipio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_municipio", $id_municipio, PDO::PARAM_INT); 
        $stmt->execute();
        $municipio = $stmt->fetch(PDO::FETCH_ASSOC);
        return $municipio;
    }
    
    function crear($data){
        $this -> conectar();
        $sql = "insert into municipio(municipio, id_estado) values (:municipio, :id_estado)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":municipio", $data['municipio'], PDO::PARAM_STR); 
        $stmt->bindParam(":id_estado", $data['id_estado'], PDO::PARAM_INT); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    
    function actualizar($id_municipio, $data){
        $this -> conectar();
        $sql = "update municipio SET municipio = :municipio, id_estado = :id_estado 
                where id_municipio = :id_municipio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":municipio", $data['municipio'], PDO::PARAM_STR); 
        $stmt->bindParam(":id_estado", $data['id_estado'], PDO::PARAM_INT); 
        $stmt->bindParam(":id_municipio", $id_municipio, PDO::PARAM_INT); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    
    function borrar($id_municipio){
        $this -> conectar();
        $sql = "delete from municipio where id_municipio = :id_municipio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_municipio", $id_municipio, PDO::PARAM_INT); 
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    
    function obtenerEstados(){
        $this -> conectar();
        $sql = "select id_estado, estado from estado order by estado";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $estados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $estados;
    }
};
?>