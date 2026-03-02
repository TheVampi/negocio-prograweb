<?php
//MODELO - Empleado
require_once(__DIR__."/../sistema.class.php");

class Empleado extends Sistema {

    function leer() {
        $this->conectar();
        $sql = "SELECT e.*, m.municipio, n.negocio
                FROM empleado e
                JOIN municipio m ON e.id_municipio = m.id_municipio
                JOIN negocio   n ON e.id_negocio   = n.id_negocio
                ORDER BY e.primer_apellido";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function leerUno($id_empleado) {
        $this->conectar();
        $sql = "SELECT * FROM empleado WHERE id_empleado = :id_empleado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_empleado", $id_empleado, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function crear($data) {
        $this->conectar();
        $this->db->beginTransaction();
        $cantidad = 0;

        try {
            // Verificar si el correo ya existe en usuario
            $sql  = "SELECT correo FROM usuario WHERE correo = :correo";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                // Crear el usuario
                $data['contrasena'] = md5($data['contrasena']);
                $sql  = "INSERT INTO usuario(correo, contrasena) VALUES (:correo, :contrasena)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":correo",     $data['correo'],     PDO::PARAM_STR);
                $stmt->bindParam(":contrasena", $data['contrasena'], PDO::PARAM_STR);
                $stmt->execute();

                // Recuperar el id_usuario recién creado
                $sql  = "SELECT id_usuario FROM usuario WHERE correo = :correo";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":correo", $data['correo'], PDO::PARAM_STR);
                $stmt->execute();
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                $data['id_usuario'] = $usuario['id_usuario'];

                // Insertar el empleado
                $sql = "INSERT INTO empleado(nombre, primer_apellido, segundo_apellido,
                            fecha_nacimiento, rfc, curp, imagen, id_municipio, id_usuario, id_negocio)
                        VALUES (:nombre, :primer_apellido, :segundo_apellido,
                            :fecha_nacimiento, :rfc, :curp, :imagen, :id_municipio, :id_usuario, :id_negocio)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":nombre",           $data['nombre'],           PDO::PARAM_STR);
                $stmt->bindParam(":primer_apellido",  $data['primer_apellido'],  PDO::PARAM_STR);
                $stmt->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
                $stmt->bindParam(":fecha_nacimiento", $data['fecha_nacimiento'], PDO::PARAM_STR);
                $stmt->bindParam(":rfc",              $data['rfc'],              PDO::PARAM_STR);
                $stmt->bindParam(":curp",             $data['curp'],             PDO::PARAM_STR);
                $stmt->bindParam(":imagen",           $data['imagen'],           PDO::PARAM_STR);
                $stmt->bindParam(":id_municipio",     $data['id_municipio'],     PDO::PARAM_INT);
                $stmt->bindParam(":id_usuario",       $data['id_usuario'],       PDO::PARAM_INT);
                $stmt->bindParam(":id_negocio",       $data['id_negocio'],       PDO::PARAM_INT);
                $stmt->execute();
                $cantidad = $stmt->rowCount();
            }

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }

        return $cantidad;
    }

    function actualizar($id_empleado, $data) {
        $this->conectar();
        $sql = "UPDATE empleado SET
                    nombre           = :nombre,
                    primer_apellido  = :primer_apellido,
                    segundo_apellido = :segundo_apellido,
                    fecha_nacimiento = :fecha_nacimiento,
                    rfc              = :rfc,
                    curp             = :curp,
                    imagen           = :imagen,
                    id_municipio     = :id_municipio,
                    id_usuario       = :id_usuario,
                    id_negocio       = :id_negocio
                WHERE id_empleado = :id_empleado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nombre",           $data['nombre'],           PDO::PARAM_STR);
        $stmt->bindParam(":primer_apellido",  $data['primer_apellido'],  PDO::PARAM_STR);
        $stmt->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $data['fecha_nacimiento'], PDO::PARAM_STR);
        $stmt->bindParam(":rfc",              $data['rfc'],              PDO::PARAM_STR);
        $stmt->bindParam(":curp",             $data['curp'],             PDO::PARAM_STR);
        $stmt->bindParam(":imagen",           $data['imagen'],           PDO::PARAM_STR);
        $stmt->bindParam(":id_municipio",     $data['id_municipio'],     PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario",       $data['id_usuario'],       PDO::PARAM_INT);
        $stmt->bindParam(":id_negocio",       $data['id_negocio'],       PDO::PARAM_INT);
        $stmt->bindParam(":id_empleado",      $id_empleado,              PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function borrar($id_empleado) {
        $this->conectar();
        $sql = "DELETE FROM empleado WHERE id_empleado = :id_empleado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_empleado", $id_empleado, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
