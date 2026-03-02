<h1>Municipios</h1>
<a href="municipio.php?accion=crear" class="btn btn-success">Nuevo Municipio</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Municipio</th>
      <th scope="col">Estado</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($municipios as $municipio): ?>
    <tr>
      <th scope="row"><?php echo $municipio["id_municipio"]; ?></th>
      <td><?php echo $municipio["municipio"]; ?></td>
      <td><?php echo $municipio["estado"]; ?></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="municipio.php?accion=actualizar&id=<?php echo $municipio["id_municipio"]; ?>"  
               class="btn btn-warning">Editar</a>
            <a href="municipio.php?accion=borrar&id=<?php echo $municipio["id_municipio"]; ?>"  
               class="btn btn-danger" 
               onclick="return confirm('¿Estás seguro de eliminar este municipio?')">Eliminar</a>
        </div>
      </td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>