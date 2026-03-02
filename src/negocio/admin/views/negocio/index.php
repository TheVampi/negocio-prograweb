<h1>Negocios</h1>
<a href="negocio.php?accion=crear" class="btn btn-success">Nuevo Negocio</a>
<table class="table table-striped mt-3">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Negocio</th>
      <th scope="col">Municipio</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($negocios as $negocio): ?>
    <tr>
      <th scope="row"><?php echo $negocio["id_negocio"]; ?></th>
      <td><?php echo $negocio["negocio"]; ?></td>
      <td><?php echo $negocio["municipio"]; ?></td>
      <td>
        <div class="btn-group" role="group">
            <a href="negocio.php?accion=actualizar&id=<?php echo $negocio["id_negocio"]; ?>" class="btn btn-warning">Editar</a>
            <a href="negocio.php?accion=borrar&id=<?php echo $negocio["id_negocio"]; ?>" class="btn btn-danger"
               onclick="return confirm('¿Estás seguro de eliminar este negocio?')">Eliminar</a>
        </div>
      </td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
