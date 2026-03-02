<h2 class="mb-4">Nuevo Usuario</h2>

<div class="form-section">
    <form action="usuario.php?accion=crear" method="POST">

        <div class="mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="correo" id="correo" required
                   maxlength="50" placeholder="Ej. correo@ejemplo.com">
        </div>

        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contrasena" id="contrasena" required
                   maxlength="255" placeholder="Ingresa una contraseña">
        </div>

        <div class="d-flex gap-2">
            <input type="submit" class="btn btn-primary" name="usuario" value="Guardar">
            <a href="usuario.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>
