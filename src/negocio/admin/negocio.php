<?php
//controlador
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/negocio.php');

$app = new Negocio();

$id = (isset($_GET['id']))?$_GET['id']:null;
$accion = (isset($_GET['accion']))?$_GET['accion']:null;

include_once(__DIR__.'/views/header.php');

switch($accion){
    case 'crear':
        if(isset($_POST['negocio'])){
            $data = [
                "negocio"     => $_POST['negocio'],
                "descripcion" => $_POST['descripcion'],
                "telefono"    => $_POST['telefono'],
                "correo"      => $_POST['correo'],
                "direccion"   => $_POST['direccion']
            ];
            $cantidad = $app->crear($data);
            if ($cantidad){
                $app->alerta('success','Se creó un nuevo negocio');
            } else {
                $app->alerta('danger','No se dio de alta nada');
            }
            $negocios = $app->leer();
            require(__DIR__."/views/negocio/index.php");
        } else {
            require(__DIR__."/views/negocio/formulario_crear.php");
        }
        break;

    case 'actualizar':
        if(isset($_POST['negocio'])){
            $data = [
                "negocio"     => $_POST['negocio'],
                "descripcion" => $_POST['descripcion'],
                "telefono"    => $_POST['telefono'],
                "correo"      => $_POST['correo'],
                "direccion"   => $_POST['direccion']
            ];
            $cantidad = $app->actualizar($id, $data);
            if ($cantidad){
                $app->alerta('success','Se actualizó el negocio');
            } else {
                $app->alerta('danger','No se actualizó nada');
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
        if ($cantidad){
            $app->alerta('success','Se eliminó el negocio');
        } else {
            $app->alerta('danger','No se eliminó nada');
        }
        $negocios = $app->leer();
        require(__DIR__."/views/negocio/index.php");
        break;

    default:
        $negocios = $app->leer();
        require(__DIR__."/views/negocio/index.php");
        break;
}

include_once(__DIR__.'/views/footer.php');
?>
