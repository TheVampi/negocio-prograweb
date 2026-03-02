<h1>Registros de Empleados</h1>
<a href="empleado.php?accion=crear" class="btn btn-success">Nuevo Empleado</a>
<table class="table table-striped mt-3">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Primer Apellido</th>
      <th scope="col">Segundo Apellido</th>
      <th scope="col">RFC</th>
      <th scope="col">CURP</th>
      <th scope="col">Municipio</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($empleados as $empleado): ?>
    <tr>
      <th scope="row"><?php echo $empleado["id_empleado"]; ?></th>
      <td><?php echo $empleado["nombre"]; ?></td>
      <td><?php echo $empleado["primer_apellido"]; ?></td>
      <td><?php echo $empleado["segundo_apellido"]; ?></td>
      <td><?php echo $empleado["rfc"]; ?></td>
      <td><?php echo $empleado["curp"]; ?></td>
      <td><?php echo $empleado["municipio"]; ?></td>
      <td>
        <div class="btn-group" role="group">
            <a href="empleado.php?accion=actualizar&id=<?php echo $empleado["id_empleado"]; ?>" class="btn btn-warning">Editar</a>
            <a href="empleado.php?accion=borrar&id=<?php echo $empleado["id_empleado"]; ?>" class="btn btn-danger"
               onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</a>
        </div>
      </td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
