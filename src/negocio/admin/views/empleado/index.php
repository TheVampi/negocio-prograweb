<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Empleados</h2>
    <a href="empleado.php?accion=crear" class="btn btn-success">+ Nuevo Empleado</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>RFC</th>
                <th>Municipio</th>
                <th>Negocio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td><span class="badge bg-secondary"><?php echo $empleado["id_empleado"]; ?></span></td>
                <td><?php echo $empleado["nombre"]; ?></td>
                <td><?php echo $empleado["primer_apellido"]; ?></td>
                <td><?php echo $empleado["segundo_apellido"]; ?></td>
                <td><?php echo $empleado["rfc"]; ?></td>
                <td><?php echo $empleado["municipio"]; ?></td>
                <td><?php echo $empleado["negocio"]; ?></td>
                <td>
                    <a href="empleado.php?accion=actualizar&id=<?php echo $empleado["id_empleado"]; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="empleado.php?accion=borrar&id=<?php echo $empleado["id_empleado"]; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Deseas eliminar al empleado <?php echo $empleado["nombre"]; ?> <?php echo $empleado["primer_apellido"]; ?>?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
