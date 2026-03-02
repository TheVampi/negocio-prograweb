<h1>Roles</h1>
<a href="rol.php?accion=crear" class="btn btn-success">Nuevo</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Rol</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($roles as $rol): ?>
    <tr>
      <th scope="row"><?php echo $rol["id_rol"]; ?></th>
      <td><?php echo $rol["rol"]; ?></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="rol.php?accion=actualizar&id=<?php echo $rol["id_rol"]; ?>"  class="btn btn-warning">Editar</a>
            <a href="rol.php?accion=borrar&id=<?php echo $rol["id_rol"]; ?>"  class="btn btn-danger">Eliminar</a>
        </div>
      </td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>        
