<?php
//controlador - Negocio
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/negocio.php');
require_once(__DIR__.'/models/municipio.php');

$app          = new Negocio;
$appMunicipio = new Municipio;

$id     = (isset($_GET['id']))     ? $_GET['id']     : null;
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : null;

// Se carga la lista de municipios para los formularios
$municipios = $appMunicipio->leer();

include_once(__DIR__.'/views/header.php');

switch ($accion) {

    case 'crear':
        if (isset($_POST['enviar'])) {
            $data = [
                "negocio"      => $_POST['negocio'],
                "id_municipio" => $_POST['id_municipio']
            ];
            $cantidad = $app->crear($data);
            if ($cantidad) {
                $app->alerta('success', 'Se creó un nuevo negocio correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo crear el negocio.');
            }
            $negocios = $app->leer();
            require(__DIR__."/views/negocio/index.php");
        } else {
            require(__DIR__."/views/negocio/formulario_crear.php");
        }
        break;

    case 'actualizar':
        if (isset($_POST['enviar'])) {
            $data = [
                "negocio"      => $_POST['negocio'],
                "id_municipio" => $_POST['id_municipio']
            ];
            $cantidad = $app->actualizar($id, $data);
            if ($cantidad) {
                $app->alerta('success', 'Se actualizó el negocio correctamente.');
            } else {
                $app->alerta('danger', 'No se pudo actualizar el negocio.');
            }
            $negocios = $app->leer();
            require(__DIR__."/views/negocio/index.php");
        } else {
            $data = $app->leerUno($id);
            require(__DIR__."/views/negocio/formulario_actualizar.php");
        }
        break;

    case 'borrar':
        $cantidad = $app->borrar($id);
        if ($cantidad) {
            $app->alerta('success', 'Se eliminó el negocio correctamente.');
        } else {
            $app->alerta('danger', 'No se pudo eliminar el negocio.');
        }
        $negocios = $app->leer();
        require(__DIR__."/views/negocio/index.php");
        break;

    case 'leer':
    default:
        $negocios = $app->leer();
        require(__DIR__."/views/negocio/index.php");
}

include_once(__DIR__.'/views/footer.php');
?>
