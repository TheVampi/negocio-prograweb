<?php
//controlador - Municipio
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/municipio.php');
require_once(__DIR__.'/models/estado.php');

$app        = new Municipio;
$appEstado  = new Estado;

$id     = (isset($_GET['id']))     ? $_GET['id']     : null;
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;

// Se carga la lista de estados una sola vez (se usa en los formularios)
$estados = $appEstado->leer();

include_once(__DIR__.'/views/header.php');

switch ($accion) {

    case 'crear':
        if (isset($_POST['enviar'])) {
            $data = [
                "municipio" => $_POST['municipio'],
                "id_estado" => $_POST['id_estado']
            ];
            $cantidad = $app->crear($data);
            if ($cantidad) {
                $app->alerta('success', 'Se creó un nuevo municipio correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo crear el municipio.');
            }
            $municipios = $app->leer();
            require(__DIR__."/views/municipio/index.php");
        } else {
            require(__DIR__."/views/municipio/formulario_crear.php");
        }
        break;

    case 'actualizar':
        if (isset($_POST['enviar'])) {
            $data = [
                "municipio" => $_POST['municipio'],
                "id_estado" => $_POST['id_estado']
            ];
            $cantidad = $app->actualizar($id, $data);
            if ($cantidad) {
                $app->alerta('success', 'Se actualizó el municipio correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo actualizar el municipio.');
            }
            $municipios = $app->leer();
            require(__DIR__."/views/municipio/index.php");
        } else {
            $data = $app->leerUno($id);
            require(__DIR__."/views/municipio/formulario_actualizar.php");
        }
        break;

    case 'borrar':
        $cantidad = $app->borrar($id);
        if ($cantidad) {
            $app->alerta('success', 'Se eliminó el municipio correctamente.');
        } else {
            $app->alerta('danger', 'No se pudo eliminar el municipio.');
        }
        $municipios = $app->leer();
        require(__DIR__."/views/municipio/index.php");
        break;

    case 'leer':
    default:
        $municipios = $app->leer();
        require(__DIR__."/views/municipio/index.php");
}

include_once(__DIR__.'/views/footer.php');
?>
