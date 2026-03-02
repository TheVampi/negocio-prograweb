<h1>Entidades Federativas</h1>
<a href="estado.php?accion=crear" class="btn btn-success">Nuevo</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($estados as $estado): ?>
    <tr>
      <th scope="row"><?php echo $estado["id_estado"]; ?></th>
      <td><?php echo $estado["estado"]; ?></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="estado.php?accion=actualizar&id=<?php echo $estado["id_estado"]; ?>"  class="btn btn-warning">Editar</a>
            <a href="estado.php?accion=borrar&id=<?php echo $estado["id_estado"]; ?>"  class="btn btn-danger">Eliminar</a>
        </div>
      </td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>        
