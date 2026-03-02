<?php
//controlador
require_once(__DIR__."/sistema.class.php");
require_once(__DIR__.'/models/empleado.php');
require_once(__DIR__.'/models/municipio.php');

$app = new Empleado();
$appEmpleado = new Empleado();

$id = (isset($_GET['id']))?$_GET['id']:null;
$accion = (isset($_GET['accion']))?$_GET['accion']:null;
$estados = $appEstado->leer();

include_once(__DIR__.'/views/header.php');

switch($accion){
    case 'crear':
        if(isset($_POST['empleado'])){
            $data = [
                "nombre" => $_POST['nombre']
            ];
            $cantidad = $appEmpleado->crear($data);
            if ($cantidad){
                $appEmpleado->alerta('success','Se creó un nuevo empleado');
            } else {
                $appEmpleado->alerta('danger','No se dio de alta nada');
            }
            $empleados = $appEmpleado->leer();
            require(__DIR__."/views/empleado/index.php");  
        } else{
            $estados;
            require(__DIR__."/views/empleado/formulario_crear.php");   
        }
        break;
        
    case 'actualizar':
        if(isset($_POST['empleado'])){
            $data = [
                "nombre" => $_POST['nombre'],
                "id_estado" => $_POST['id_estado']
            ];
            $cantidad = $appEmpleado->actualizar($id, $data);
            if ($cantidad){
                $appEmpleado->alerta('success','Se actualizó el empleado');
            } else {
                $appEmpleado->alerta('danger','No se actualizó nada');
            }
            $empleados = $appEmpleado->leer();
            require(__DIR__."/views/empleado/index.php");  
        } else {
            $data = $appEmpleado->leerUno($id);
            $estados = $appEstado->leer();
            require(__DIR__."/views/empleado/formulario_actualizar.php");   
        }
        break;
        
    case 'borrar':
        $cantidad = $appEmpleado->borrar($id);
        if ($cantidad){
            $appEmpleado->alerta('success','Se eliminó el empleado');
        } else {
            $appEmpleado->alerta('danger','No se eliminó nada');
        }
        $empleados = $appEmpleado->leer();
        require(__DIR__."/views/empleado/index.php");  
        break;
        
    case 'leer':
    default:
        $empleados = $appEmpleado->leer();
        require(__DIR__."/views/empleado/index.php");            
}
include_once(__DIR__.'/views/footer.php');
?>