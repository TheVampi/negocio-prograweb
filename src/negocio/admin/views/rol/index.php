<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Roles</h2>
    <a href="rol.php?accion=crear" class="btn btn-success">+ Nuevo Rol</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $rol): ?>
            <tr>
                <td><span class="badge bg-secondary"><?php echo $rol["id_rol"]; ?></span></td>
                <td><?php echo $rol["rol"]; ?></td>
                <td>
                    <a href="rol.php?accion=actualizar&id=<?php echo $rol["id_rol"]; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="rol.php?accion=borrar&id=<?php echo $rol["id_rol"]; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Deseas eliminar el rol <?php echo $rol["rol"]; ?>?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
