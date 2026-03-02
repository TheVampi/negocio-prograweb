<h2 class="mb-4">Nuevo Negocio</h2>

<div class="form-section">
    <form action="negocio.php?accion=crear" method="POST" id="form-negocio">

        <div class="mb-3">
            <label for="negocio" class="form-label">Nombre del Negocio</label>
            <input type="text" class="form-control" name="negocio" id="negocio" required
                   maxlength="50" placeholder="Ej. Taquería El Rey">
        </div>

        <div class="mb-3">
            <label for="municipio_buscar" class="form-label">Municipio</label>

            <!-- Input visible: el usuario escribe aquí y ve las sugerencias -->
            <input type="text"
                   class="form-control"
                   id="municipio_buscar"
                   list="lista_municipios"
                   autocomplete="off"
                   required
                   placeholder="Escribe el nombre del municipio...">

            <!-- Catálogo completo de municipios para el datalist -->
            <datalist id="lista_municipios">
                <?php foreach ($municipios as $municipio): ?>
                    <option value="<?php echo htmlspecialchars($municipio['municipio'] . ' - ' . $municipio['estado']); ?>"></option>
                <?php endforeach; ?>
            </datalist>

            <!-- Campo oculto: guarda el id_municipio real que se envía al controller -->
            <input type="hidden" name="id_municipio" id="id_municipio">

            <small class="text-muted">Selecciona uno de la lista desplegable para confirmar.</small>
            <div class="invalid-feedback">Debes seleccionar un municipio válido de la lista.</div>
        </div>

        <div class="d-flex gap-2">
            <input type="submit" class="btn btn-primary" name="enviar" value="Guardar">
            <a href="negocio.php" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>
</div>

<script>
// Mapa nombre visible → id_municipio (generado desde PHP)
var municipioMap = <?php
$map = [];
foreach ($municipios as $municipio) {
    $key = $municipio['municipio'] . ' - ' . $municipio['estado'];
    $map[$key] = (int)$municipio['id_municipio'];
}
echo json_encode($map);
?>;

var inputBuscar = document.getElementById('municipio_buscar');
var inputId     = document.getElementById('id_municipio');

// Cada vez que el usuario elige o deja de escribir, se actualiza el campo oculto
inputBuscar.addEventListener('change', function () {
    var id = municipioMap[this.value];
    if (id) {
        inputId.value = id;
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
    } else {
        inputId.value = '';
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
    }
});

// Validar antes de enviar el formulario
document.getElementById('form-negocio').addEventListener('submit', function (e) {
    if (!inputId.value) {
        e.preventDefault();
        inputBuscar.classList.add('is-invalid');
        inputBuscar.focus();
    }
});
</script>
