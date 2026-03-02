<?php
//controlador
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/empleado.php');

$app = new Empleado();

$id = (isset($_GET['id']))?$_GET['id']:null;
$accion = (isset($_GET['accion']))?$_GET['accion']:null;
$municipios = $app->obtenerMunicipios();
$usuarios = $app->obtenerUsuarios();
$negocios = $app->obtenerNegocios();

include_once(__DIR__.'/views/header.php');

switch($accion){
    case 'crear':
        if(isset($_POST['nombre'])){
            $data = [
                "nombre" => $_POST['nombre'],
                "primer_apellido" => $_POST['primer_apellido'],
                "segundo_apellido" => $_POST['segundo_apellido'],
                "fecha_nacimiento" => $_POST['fecha_nacimiento'],
                "rfc" => $_POST['rfc'],
                "curp" => $_POST['curp'],
                "imagen" => $_POST['imagen'],
                "id_municipio" => $_POST['id_municipio'],
                "correo" => $_POST['correo'],
                "contrasena" => $_POST['contrasena'],
                "id_negocio" => $_POST['id_negocio']
            ];
            $cantidad = $app->crear($data);
            if ($cantidad){
                $app->alerta('success','Se creó un nuevo empleado');
            } else {
                $app->alerta('danger','No se dio de alta nada');
            }
            $empleados = $app->leer();
            require(__DIR__."/views/empleado/index.php");
        } else{
            require(__DIR__."/views/empleado/formulario_crear.php");
        }
        break;

    case 'actualizar':
        if(isset($_POST['nombre'])){
            $data = [
                "nombre" => $_POST['nombre'],
                "primer_apellido" => $_POST['primer_apellido'],
                "segundo_apellido" => $_POST['segundo_apellido'],
                "fecha_nacimiento" => $_POST['fecha_nacimiento'],
                "rfc" => $_POST['rfc'],
                "curp" => $_POST['curp'],
                "imagen" => $_POST['imagen'],
                "id_municipio" => $_POST['id_municipio'],
                "id_usuario" => $_POST['id_usuario'],
                "id_negocio" => $_POST['id_negocio']
            ];
            $cantidad = $app->actualizar($id, $data);
            if ($cantidad){
                $app->alerta('success','Se actualizó el empleado');
            } else {
                $app->alerta('danger','No se actualizó nada');
            }
            $empleados = $app->leer();
            require(__DIR__."/views/empleado/index.php");
        } else {
            $data = $app->leerUno($id);
            require(__DIR__."/views/empleado/formulario_actualizar.php");
        }
        break;

    case 'borrar':
        $cantidad = $app->borrar($id);
        if ($cantidad){
            $app->alerta('success','Se eliminó el empleado');
        } else {
            $app->alerta('danger','No se eliminó nada');
        }
        $empleados = $app->leer();
        require(__DIR__."/views/empleado/index.php");
        break;

    case 'leer':
    default:
        $empleados = $app->leer();
        require(__DIR__."/views/empleado/index.php");
}
include_once(__DIR__.'/views/footer.php');
?>