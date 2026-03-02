<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Usuarios</h2>
    <a href="usuario.php?accion=crear" class="btn btn-success">+ Nuevo Usuario</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><span class="badge bg-secondary"><?php echo $usuario["id_usuario"]; ?></span></td>
                <td><?php echo $usuario["correo"]; ?></td>
                <td>
                    <a href="usuario.php?accion=actualizar&id=<?php echo $usuario["id_usuario"]; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="usuario.php?accion=borrar&id=<?php echo $usuario["id_usuario"]; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Deseas eliminar el usuario <?php echo $usuario["correo"]; ?>?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
