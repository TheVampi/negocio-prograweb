<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DashBla System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body { background-color: #f8f9fa; }
      .navbar-brand { font-weight: bold; letter-spacing: 1px; }
      .table th { background-color: #343a40; color: white; }
      .card { border: none; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
      .form-section { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.08); max-width: 600px; }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="../images/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
          DashBla System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                Catálogos
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="estado.php">Estados</a></li>
                <li><a class="dropdown-item" href="municipio.php">Municipios</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="rol.php">Roles</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="negocio.php">Negocios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="usuario.php">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="empleado.php">Empleados</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
