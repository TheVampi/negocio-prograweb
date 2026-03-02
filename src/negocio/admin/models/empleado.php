<?php
//MODELO
require_once(__DIR__."/../sistema.class.php");
class Empleado extends Sistema{
    function leer(){
        $this->conectar();
        $sql = "select e.*, m.municipio
                from empleado e
                join municipio m on e.id_municipio = m.id_municipio";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $empleados;
    }
    function leerUno($id_empleado){
        $this->conectar();
        $sql = "select * from empleado where id_empleado = :id_empleado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_empleado", $id_empleado, PDO::PARAM_INT);
        $stmt->execute();
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $empleado;
    }
    function crear($data){
        $this->conectar();
        $sql = "insert into empleado(nombre, primer_apellido, segundo_apellido, fecha_nacimiento, rfc, curp, imagen, id_municipio, id_usuario, id_negocio)
                values (:nombre, :primer_apellido, :segundo_apellido, :fecha_nacimiento, :rfc, :curp, :imagen, :id_municipio, :id_usuario, :id_negocio)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $data['fecha_nacimiento'], PDO::PARAM_STR);
        $stmt->bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
        $stmt->bindParam(":curp", $data['curp'], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $data['imagen'], PDO::PARAM_STR);
        $stmt->bindParam(":id_municipio", $data['id_municipio'], PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(":id_negocio", $data['id_negocio'], PDO::PARAM_INT);
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function actualizar($id_empleado, $data){
        $this->conectar();
        $sql = "update empleado set nombre = :nombre, primer_apellido = :primer_apellido, segundo_apellido = :segundo_apellido,
                fecha_nacimiento = :fecha_nacimiento, rfc = :rfc, curp = :curp, imagen = :imagen,
                id_municipio = :id_municipio, id_usuario = :id_usuario, id_negocio = :id_negocio
                where id_empleado = :id_empleado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $data['fecha_nacimiento'], PDO::PARAM_STR);
        $stmt->bindParam(":rfc", $data['rfc'], PDO::PARAM_STR);
        $stmt->bindParam(":curp", $data['curp'], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $data['imagen'], PDO::PARAM_STR);
        $stmt->bindParam(":id_municipio", $data['id_municipio'], PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $data['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(":id_negocio", $data['id_negocio'], PDO::PARAM_INT);
        $stmt->bindParam(":id_empleado", $id_empleado, PDO::PARAM_INT);
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function borrar($id_empleado){
        $this->conectar();
        $sql = "delete from empleado where id_empleado = :id_empleado";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_empleado", $id_empleado, PDO::PARAM_INT);
        $resultado = $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }
    function obtenerMunicipios(){
        $this->conectar();
        $sql = "select id_municipio, municipio from municipio order by municipio";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $municipios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $municipios;
    }
    function obtenerUsuarios(){
        $this->conectar();
        $sql = "select id_usuario, correo from usuario order by correo";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usuarios;
    }
    function obtenerNegocios(){
        $this->conectar();
        $sql = "select id_negocio, negocio from negocio order by negocio";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $negocios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $negocios;
    }
};
?>