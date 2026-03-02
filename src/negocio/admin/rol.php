<?php
//controlador
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/rol.php');
$app = new Rol;

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
        if(isset($_POST['rol'])){
            //se hace un clon
            $data=$_POST;
            $cantidad=$app->crear($data);
            if ($cantidad){
                $app->alerta('success','Se creo un nuevo rol');
            } else {
                $app->alerta('danger','No se dio de alta nada');
            }
            $roles=$app->leer();
            require(__DIR__."/views/rol/index.php");  
        } else{
            require(__DIR__."/views/rol/formulario_crear.php");   
        }
        break;
    case 'actualizar':
        if(isset($_POST['rol'])){
            //se hace un clon
            $data=$_POST;
            $cantidad=$app->actualizar($id,$data);
            if ($cantidad){
                $app->alerta('success','Se actualizo el rol');
            } else {
                $app->alerta('danger','No se actualizo nada');
            }
            $roles=$app->leer();
            require(__DIR__."/views/rol/index.php");  
        }else{
            $data=$app->leerUno($id);
            require(__DIR__."/views/rol/formulario_actualizar.php");   
        }
        break;
    case 'borrar':
        $cantidad=$app->borrar($id);
        if ($cantidad){
            $app->alerta('success','Se elimino el rol');
        } else {
            $app->alerta('danger','No se elimino nada');
        }
        $roles=$app->leer();
        require(__DIR__."/views/rol/index.php");  
        break;
    case 'leer':
    default:
        $roles=$app->leer();
        require(__DIR__."/views/rol/index.php");            
}
include_once(__DIR__.'/views/footer.php');

?>