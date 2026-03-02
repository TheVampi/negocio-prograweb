<?php
//controlador - Usuario
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/usuario.php');

$app = new Usuario;

$id     = (isset($_GET['id']))     ? $_GET['id']     : null;
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;

include_once(__DIR__.'/views/header.php');

switch ($accion) {

    case 'crear':
        if (isset($_POST['usuario'])) {
            $data = [
                "correo"     => $_POST['correo'],
                "contrasena" => $_POST['contrasena']
            ];
            $cantidad = $app->crear($data);
            if ($cantidad) {
                $app->alerta('success', 'Se creó un nuevo usuario correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo crear el usuario.');
            }
            $usuarios = $app->leer();
            require(__DIR__."/views/usuario/index.php");
        } else {
            require(__DIR__."/views/usuario/formulario_crear.php");
        }
        break;

    case 'actualizar':
        if (isset($_POST['usuario'])) {
            $data = [
                "correo"     => $_POST['correo'],
                "contrasena" => $_POST['contrasena']
            ];
            $cantidad = $app->actualizar($id, $data);
            if ($cantidad) {
                $app->alerta('success', 'Se actualizó el usuario correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo actualizar el usuario.');
            }
            $usuarios = $app->leer();
            require(__DIR__."/views/usuario/index.php");
        } else {
            $data = $app->leerUno($id);
            require(__DIR__."/views/usuario/formulario_actualizar.php");
        }
        break;

    case 'borrar':
        $cantidad = $app->borrar($id);
        if ($cantidad) {
            $app->alerta('success', 'Se eliminó el usuario correctamente.');
        } else {
            $app->alerta('danger', 'No se pudo eliminar el usuario.');
        }
        $usuarios = $app->leer();
        require(__DIR__."/views/usuario/index.php");
        break;

    case 'leer':
    default:
        $usuarios = $app->leer();
        require(__DIR__."/views/usuario/index.php");
}

include_once(__DIR__.'/views/footer.php');
?>
