<?php
//controlador - Empleado
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/empleado.php');
require_once(__DIR__.'/models/municipio.php');
require_once(__DIR__.'/models/usuario.php');
require_once(__DIR__.'/models/negocio.php');

$app          = new Empleado;
$appMunicipio = new Municipio;
$appUsuario   = new Usuario;
$appNegocio   = new Negocio;

$id     = (isset($_GET['id']))     ? $_GET['id']     : null;
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;

// Se cargan los catálogos necesarios para los formularios
$municipios = $appMunicipio->leer();
$usuarios   = $appUsuario->leer();
$negocios   = $appNegocio->leer();

include_once(__DIR__.'/views/header.php');

switch ($accion) {

    case 'crear':
        if (isset($_POST['empleado'])) {
            $data = [
                "nombre"           => $_POST['nombre'],
                "primer_apellido"  => $_POST['primer_apellido'],
                "segundo_apellido" => $_POST['segundo_apellido'],
                "fecha_nacimiento" => $_POST['fecha_nacimiento'],
                "rfc"              => $_POST['rfc'],
                "curp"             => $_POST['curp'],
                "imagen"           => $_POST['imagen'],
                "id_municipio"     => $_POST['id_municipio'],
                "id_usuario"       => $_POST['id_usuario'],
                "id_negocio"       => $_POST['id_negocio']
            ];
            $cantidad = $app->crear($data);
            if ($cantidad) {
                $app->alerta('success', 'Se registró un nuevo empleado correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo registrar el empleado.');
            }
            $empleados = $app->leer();
            require(__DIR__."/views/empleado/index.php");
        } else {
            require(__DIR__."/views/empleado/formulario_crear.php");
        }
        break;

    case 'actualizar':
        if (isset($_POST['empleado'])) {
            $data = [
                "nombre"           => $_POST['nombre'],
                "primer_apellido"  => $_POST['primer_apellido'],
                "segundo_apellido" => $_POST['segundo_apellido'],
                "fecha_nacimiento" => $_POST['fecha_nacimiento'],
                "rfc"              => $_POST['rfc'],
                "curp"             => $_POST['curp'],
                "imagen"           => $_POST['imagen'],
                "id_municipio"     => $_POST['id_municipio'],
                "id_usuario"       => $_POST['id_usuario'],
                "id_negocio"       => $_POST['id_negocio']
            ];
            $cantidad = $app->actualizar($id, $data);
            if ($cantidad) {
                $app->alerta('success', 'Se actualizó el empleado correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo actualizar el empleado.');
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
        if ($cantidad) {
            $app->alerta('success', 'Se eliminó el empleado correctamente.');
        } else {
            $app->alerta('danger', 'No se pudo eliminar el empleado.');
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
