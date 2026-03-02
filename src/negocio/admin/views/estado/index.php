<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Entidades Federativas</h2>
    <a href="estado.php?accion=crear" class="btn btn-success">+ Nuevo Estado</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estados as $estado): ?>
            <tr>
                <td><span class="badge bg-secondary"><?php echo $estado["id_estado"]; ?></span></td>
                <td><?php echo $estado["estado"]; ?></td>
                <td>
                    <a href="estado.php?accion=actualizar&id=<?php echo $estado["id_estado"]; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="estado.php?accion=borrar&id=<?php echo $estado["id_estado"]; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Deseas eliminar el estado <?php echo $estado["estado"]; ?>?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
