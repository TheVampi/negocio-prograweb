<?php
//MODELO - Estado
require_once(__DIR__."/../sistema.class.php");

class Estado extends Sistema {

    function leer() {
        $this->conectar();
        $sql = "SELECT * FROM estado ORDER BY id_estado";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerUno($id_estado) {
        $this->conectar();
        $sql = "SELECT * FROM estado WHERE id_estado = :id_estado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_estado", $id_estado, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // id_estado NO es serial, el usuario lo ingresa manualmente
    function crear($data) {
        $this->conectar();
        $sql = "INSERT INTO estado(id_estado, estado) VALUES (:id_estado, :estado)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_estado", $data['id_estado'], PDO::PARAM_INT);
        $stmt->bindParam(":estado",    $data['estado'],    PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function actualizar($id_estado, $data) {
        $this->conectar();
        $sql = "UPDATE estado SET estado = :estado WHERE id_estado = :id_estado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":estado",    $data['estado'], PDO::PARAM_STR);
        $stmt->bindParam(":id_estado", $id_estado,      PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function borrar($id_estado) {
        $this->conectar();
        $sql = "DELETE FROM estado WHERE id_estado = :id_estado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_estado", $id_estado, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
