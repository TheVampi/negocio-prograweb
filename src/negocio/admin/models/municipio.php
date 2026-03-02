<?php
//MODELO - Municipio
require_once(__DIR__."/../sistema.class.php");

class Municipio extends Sistema {

    function leer() {
        $this->conectar();
        $sql = "SELECT m.*, e.estado
                FROM municipio m
                JOIN estado e ON m.id_estado = e.id_estado
                ORDER BY m.municipio";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerUno($id_municipio) {
        $this->conectar();
        $sql = "SELECT m.*, e.estado
                FROM municipio m
                JOIN estado e ON m.id_estado = e.id_estado
                WHERE m.id_municipio = :id_municipio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_municipio", $id_municipio, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function crear($data) {
        $this->conectar();
        $sql = "INSERT INTO municipio(municipio, id_estado) VALUES (:municipio, :id_estado)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":municipio", $data['municipio'], PDO::PARAM_STR);
        $stmt->bindParam(":id_estado", $data['id_estado'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function actualizar($id_municipio, $data) {
        $this->conectar();
        $sql = "UPDATE municipio SET municipio = :municipio, id_estado = :id_estado
                WHERE id_municipio = :id_municipio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":municipio",    $data['municipio'], PDO::PARAM_STR);
        $stmt->bindParam(":id_estado",    $data['id_estado'], PDO::PARAM_INT);
        $stmt->bindParam(":id_municipio", $id_municipio,      PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function borrar($id_municipio) {
        $this->conectar();
        $sql = "DELETE FROM municipio WHERE id_municipio = :id_municipio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_municipio", $id_municipio, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
