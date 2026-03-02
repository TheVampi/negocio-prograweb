<?php
//controlador - Rol
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/rol.php');

$app = new Rol;

$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;

include_once(__DIR__.'/views/header.php');

switch ($accion) {

    case 'crear':
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            $cantidad = $app->crear($data);
            if ($cantidad) {
                $app->alerta('success', 'Se creó un nuevo rol correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo crear el rol.');
            }
            $roles = $app->leer();
            require(__DIR__."/views/rol/index.php");
        } else {
            require(__DIR__."/views/rol/formulario_crear.php");
        }
        break;

    case 'actualizar':
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            $cantidad = $app->actualizar($id, $data);
            if ($cantidad) {
                $app->alerta('success', 'Se actualizó el rol correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo actualizar el rol.');
            }
            $roles = $app->leer();
            require(__DIR__."/views/rol/index.php");
        } else {
            $data = $app->leerUno($id);
            require(__DIR__."/views/rol/formulario_actualizar.php");
        }
        break;

    case 'borrar':
        $cantidad = $app->borrar($id);
        if ($cantidad) {
            $app->alerta('success', 'Se eliminó el rol correctamente.');
        } else {
            $app->alerta('danger', 'No se pudo eliminar el rol.');
        }
        $roles = $app->leer();
        require(__DIR__."/views/rol/index.php");
        break;

    case 'leer':
    default:
        $roles = $app->leer();
        require(__DIR__."/views/rol/index.php");
}

include_once(__DIR__.'/views/footer.php');
?>
