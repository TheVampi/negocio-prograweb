<?php
//MODELO - Usuario
require_once(__DIR__."/../sistema.class.php");

class Usuario extends Sistema {

    function leer() {
        $this->conectar();
        $sql = "SELECT * FROM usuario ORDER BY id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerUno($id_usuario) {
        $this->conectar();
        $sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function crear($data) {
        $this->conectar();
        $sql = "INSERT INTO usuario(correo, contrasena) VALUES (:correo, :contrasena)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":correo",     $data['correo'],     PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function actualizar($id_usuario, $data) {
        $this->conectar();
        $sql = "UPDATE usuario SET correo = :correo, contrasena = :contrasena
                WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":correo",     $data['correo'],     PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $id_usuario,         PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function borrar($id_usuario) {
        $this->conectar();
        $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
