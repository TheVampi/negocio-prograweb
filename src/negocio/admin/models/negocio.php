<?php
//MODELO - Negocio
require_once(__DIR__."/../sistema.class.php");

class Negocio extends Sistema {

    function leer() {
        $this->conectar();
        $sql = "SELECT n.*, m.municipio
                FROM negocio n
                JOIN municipio m ON n.id_municipio = m.id_municipio
                ORDER BY n.negocio";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerUno($id_negocio) {
        $this->conectar();
        $sql = "SELECT * FROM negocio WHERE id_negocio = :id_negocio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_negocio", $id_negocio, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function crear($data) {
        $this->conectar();
        $sql = "INSERT INTO negocio(negocio, id_municipio) VALUES (:negocio, :id_municipio)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":negocio",      $data['negocio'],      PDO::PARAM_STR);
        $stmt->bindParam(":id_municipio", $data['id_municipio'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function actualizar($id_negocio, $data) {
        $this->conectar();
        $sql = "UPDATE negocio SET negocio = :negocio, id_municipio = :id_municipio
                WHERE id_negocio = :id_negocio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":negocio",      $data['negocio'],      PDO::PARAM_STR);
        $stmt->bindParam(":id_municipio", $data['id_municipio'], PDO::PARAM_INT);
        $stmt->bindParam(":id_negocio",   $id_negocio,           PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function borrar($id_negocio) {
        $this->conectar();
        $sql = "DELETE FROM negocio WHERE id_negocio = :id_negocio";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_negocio", $id_negocio, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
