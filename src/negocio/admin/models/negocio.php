<?php
//MODELO
require_once(__DIR__."/../sistema.class.php");
class Negocio extends Sistema{
    function leer(){
        $this->conectar();
        $sql = "select * from negocio order by negocio";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $negocios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $negocios;
    }
    function leerUno($id_negocio){
        $this->conectar();
        $sql = "select * from negocio where id_negocio = :id_negocio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_negocio", $id_negocio, PDO::PARAM_INT);
        $stmt->execute();
        $negocio = $stmt->fetch(PDO::FETCH_ASSOC);
        return $negocio;
    }
    function crear($data){
        $this->conectar();
        $sql = "insert into negocio(negocio, descripcion, telefono, correo, direccion)
                values (:negocio, :descripcion, :telefono, :correo, :direccion)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":negocio",     $data['negocio'],     PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":telefono",    $data['telefono'],    PDO::PARAM_STR);
        $stmt->bindParam(":correo",      $data['correo'],      PDO::PARAM_STR);
        $stmt->bindParam(":direccion",   $data['direccion'],   PDO::PARAM_STR);
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function actualizar($id_negocio, $data){
        $this->conectar();
        $sql = "update negocio set negocio = :negocio, descripcion = :descripcion,
                telefono = :telefono, correo = :correo, direccion = :direccion
                where id_negocio = :id_negocio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":negocio",     $data['negocio'],     PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(":telefono",    $data['telefono'],    PDO::PARAM_STR);
        $stmt->bindParam(":correo",      $data['correo'],      PDO::PARAM_STR);
        $stmt->bindParam(":direccion",   $data['direccion'],   PDO::PARAM_STR);
        $stmt->bindParam(":id_negocio",  $id_negocio,          PDO::PARAM_INT);
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function borrar($id_negocio){
        $this->conectar();
        $sql = "delete from negocio where id_negocio = :id_negocio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_negocio", $id_negocio, PDO::PARAM_INT);
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
}
?>
