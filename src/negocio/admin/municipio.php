<?php
//controlador
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/municipio.php');
require_once(__DIR__.'/models/estado.php');

$app = new Municipio;
$appEstado = new Estado();

$id = (isset($_GET['id']))?$_GET['id']:null;
$accion = (isset($_GET['accion']))?$_GET['accion']:null;
$estados = $appEstado->leer();

include_once(__DIR__.'/views/header.php');

switch($accion){
    case 'crear':
        if(isset($_POST['municipio'])){
            $data = [
                "municipio" => $_POST['municipio'],
                "id_estado" => $_POST['id_estado']
            ];
            $cantidad = $app->crear($data);
            if ($cantidad){
                $app->alerta('success','Se creó un nuevo municipio');
            } else {
                $app->alerta('danger','No se dio de alta nada');
            }
            $municipios = $app->leer();
            require(__DIR__."/views/municipio/index.php");  
        } else{
            $estados;
            require(__DIR__."/views/municipio/formulario_crear.php");   
        }
        break;
        
    case 'actualizar':
        if(isset($_POST['municipio'])){
            $data = [
                "municipio" => $_POST['municipio'],
                "id_estado" => $_POST['id_estado']
            ];
            $cantidad = $app->actualizar($id, $data);
            if ($cantidad){
                $app->alerta('success','Se actualizó el municipio');
            } else {
                $app->alerta('danger','No se actualizó nada');
            }
            $municipios = $app->leer();
            require(__DIR__."/views/municipio/index.php");  
        } else {
            $data = $app->leerUno($id);
            $estados = $appEstado->leer();
            require(__DIR__."/views/municipio/formulario_actualizar.php");   
        }
        break;
        
    case 'borrar':
        $cantidad = $app->borrar($id);
        if ($cantidad){
            $app->alerta('success','Se eliminó el municipio');
        } else {
            $app->alerta('danger','No se eliminó nada');
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