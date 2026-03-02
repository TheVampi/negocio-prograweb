<?php
require_once('config.php');
include_once(__DIR__.'/views/header.php');
?>

<h2 class="mb-4">Bienvenido a DashBla System</h2>
<p class="text-muted mb-4">Sistema de administración de negocios. Selecciona un módulo para comenzar.</p>

<div class="row g-4">

  <div class="col-sm-6 col-md-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Estados</h5>
        <p class="card-text text-muted">Administra las entidades federativas del sistema.</p>
        <a href="estado.php" class="btn btn-dark btn-sm">Ver Estados</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Municipios</h5>
        <p class="card-text text-muted">Administra los municipios vinculados a cada estado.</p>
        <a href="municipio.php" class="btn btn-dark btn-sm">Ver Municipios</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Roles</h5>
        <p class="card-text text-muted">Define los roles disponibles en el sistema.</p>
        <a href="rol.php" class="btn btn-dark btn-sm">Ver Roles</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Negocios</h5>
        <p class="card-text text-muted">Registra y gestiona los negocios del sistema.</p>
        <a href="negocio.php" class="btn btn-dark btn-sm">Ver Negocios</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Usuarios</h5>
        <p class="card-text text-muted">Administra los usuarios registrados en el sistema.</p>
        <a href="usuario.php" class="btn btn-dark btn-sm">Ver Usuarios</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Empleados</h5>
        <p class="card-text text-muted">Gestiona el personal vinculado a cada negocio.</p>
        <a href="empleado.php" class="btn btn-dark btn-sm">Ver Empleados</a>
      </div>
    </div>
  </div>

</div>

<?php include_once(__DIR__.'/views/footer.php'); ?>
