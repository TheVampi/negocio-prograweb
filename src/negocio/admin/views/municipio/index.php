<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Municipios</h2>
    <a href="municipio.php?accion=crear" class="btn btn-success">+ Nuevo Municipio</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Municipio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($municipios as $municipio): ?>
            <tr>
                <td><span class="badge bg-secondary"><?php echo $municipio["id_municipio"]; ?></span></td>
                <td><?php echo $municipio["municipio"]; ?></td>
                <td><?php echo $municipio["estado"]; ?></td>
                <td>
                    <a href="municipio.php?accion=actualizar&id=<?php echo $municipio["id_municipio"]; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="municipio.php?accion=borrar&id=<?php echo $municipio["id_municipio"]; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Deseas eliminar el municipio <?php echo $municipio["municipio"]; ?>?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
