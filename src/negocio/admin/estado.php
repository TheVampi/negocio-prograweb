<?php
//controlador - Estado
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/estado.php');

$app = new Estado;

$id = (isset($_GET['id'])) ? $_GET['id'] : null;
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;

include_once(__DIR__.'/views/header.php');

switch ($accion) {

    case 'crear':
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            $cantidad = $app->crear($data);
            if ($cantidad) {
                $app->alerta('success', 'Se creó un nuevo estado correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo crear el estado.');
            }
            $estados = $app->leer();
            require(__DIR__."/views/estado/index.php");
        } else {
            require(__DIR__."/views/estado/formulario_crear.php");
        }
        break;

    case 'actualizar':
        if (isset($_POST['enviar'])) {
            $data = $_POST;
            $cantidad = $app->actualizar($id, $data);
            if ($cantidad) {
                $app->alerta('success', 'Se actualizó el estado correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo actualizar el estado.');
            }
            $estados = $app->leer();
            require(__DIR__."/views/estado/index.php");
        } else {
            $data = $app->leerUno($id);
            require(__DIR__."/views/estado/formulario_actualizar.php");
        }
        break;

    case 'borrar':
        $cantidad = $app->borrar($id);
        if ($cantidad) {
            $app->alerta('success', 'Se eliminó el estado correctamente.');
        } else {
            $app->alerta('danger', 'No se pudo eliminar el estado.');
        }
        $estados = $app->leer();
        require(__DIR__."/views/estado/index.php");
        break;

    case 'leer':
    default:
        $estados = $app->leer();
        require(__DIR__."/views/estado/index.php");
}

include_once(__DIR__.'/views/footer.php');
?>
