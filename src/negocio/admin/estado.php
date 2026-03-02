<?php
//controlador
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/estado.php');
$app = new Estado;

//if ternario
/* Es lo mismo
if(isset($_GET['id'])){
    $id = $_GET['id'];
} else{
    $id = null;
}
*/
$id = (isset($_GET['id']))?$_GET['id']:null;
$accion = (isset($_GET['accion']))?$_GET['accion']:null;
//La accion hara un punto de inflexion para decirle al enrutador que hacer
include_once(__DIR__.'/views/header.php');

switch($accion){
    case 'crear':
        if(isset($_POST['estado'])){
            //se hace un clon
            $data=$_POST;
            $cantidad=$app->crear($data);
            if ($cantidad){
                $app->alerta('success','Se creo un nuevo estado');
            } else {
                $app->alerta('danger','No se dio de alta nada');
            }
            $estados=$app->leer();
            require(__DIR__."/views/estado/index.php");  
        } else{
            require(__DIR__."/views/estado/formulario_crear.php");   
        }
        break;
    case 'actualizar':
        if(isset($_POST['estado'])){
            //se hace un clon
            $data=$_POST;
            $cantidad=$app->actualizar($id,$data);
            if ($cantidad){
                $app->alerta('success','Se actualizo el estado');
            } else {
                $app->alerta('danger','No se actualizo nada');
            }
            $estados=$app->leer();
            require(__DIR__."/views/estado/index.php");  
        }else{
            $data=$app->leerUno($id);
            require(__DIR__."/views/estado/formulario_actualizar.php");   
        }
        break;
    case 'borrar':
        $cantidad=$app->borrar($id);
        if ($cantidad){
            $app->alerta('success','Se elimino el estado');
        } else {
            $app->alerta('danger','No se elimino nada');
        }
        $estados=$app->leer();
        require(__DIR__."/views/estado/index.php");  
        break;
    case 'leer':
    default:
        $estados=$app->leer();
        require(__DIR__."/views/estado/index.php");            
}
include_once(__DIR__.'/views/footer.php');

?>