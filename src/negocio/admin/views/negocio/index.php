<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Negocios</h2>
    <a href="negocio.php?accion=crear" class="btn btn-success">+ Nuevo Negocio</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Negocio</th>
                <th>Municipio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($negocios as $negocio): ?>
            <tr>
                <td><span class="badge bg-secondary"><?php echo $negocio["id_negocio"]; ?></span></td>
                <td><?php echo $negocio["negocio"]; ?></td>
                <td><?php echo $negocio["municipio"]; ?></td>
                <td>
                    <a href="negocio.php?accion=actualizar&id=<?php echo $negocio["id_negocio"]; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="negocio.php?accion=borrar&id=<?php echo $negocio["id_negocio"]; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Deseas eliminar el negocio <?php echo $negocio["negocio"]; ?>?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
