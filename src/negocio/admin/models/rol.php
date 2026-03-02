<?php
//MODELO - Rol
require_once(__DIR__."/../sistema.class.php");

class Rol extends Sistema {

    function leer() {
        $this->conectar();
        $sql = "SELECT * FROM rol ORDER BY id_rol";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerUno($id_rol) {
        $this->conectar();
        $sql = "SELECT * FROM rol WHERE id_rol = :id_rol";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // id_rol NO es serial, el usuario lo ingresa manualmente
    function crear($data) {
        $this->conectar();
        $sql = "INSERT INTO rol(id_rol, rol) VALUES (:id_rol, :rol)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_rol", $data['id_rol'], PDO::PARAM_INT);
        $stmt->bindParam(":rol",    $data['rol'],    PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function actualizar($id_rol, $data) {
        $this->conectar();
        $sql = "UPDATE rol SET rol = :rol WHERE id_rol = :id_rol";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":rol",    $data['rol'], PDO::PARAM_STR);
        $stmt->bindParam(":id_rol", $id_rol,      PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function borrar($id_rol) {
        $this->conectar();
        $sql = "DELETE FROM rol WHERE id_rol = :id_rol";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_rol", $id_rol, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
