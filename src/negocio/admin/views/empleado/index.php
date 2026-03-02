<h1>Registros de Empleados</h1>
<a href="empleado.php?accion=crear" class="btn btn-success">Nuevo</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($empleados as $empleado): ?>
    <tr>
      <th scope="row"><?php echo $empleado["id_empleado"]; ?></th>
      <td><?php echo $empleado["nombre"]; ?></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="empleado.php?accion=actualizar&id=<?php echo $empleado["id_empleado"]; ?>"  class="btn btn-warning">Editar</a>
            <a href="empleado.php?accion=borrar&id=<?php echo $empleado["id_empleado"]; ?>"  class="btn btn-danger">Eliminar</a>
        </div>
      </td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>        
