<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>ZELVIX</title>
  <link rel="icon" type="image/png" href="img/icono.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
      <a class="navbar-brand" href="index.php">
  <img src="img/inicio.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
  ZELVIX
</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">          
          <li class="nav-item"><a class="nav-link" href="crud_motos.php">Adminsitrar Motos</a></li>
          <li class="nav-item"><a class="nav-link" href="register_admin.php">Registrar Administrador</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Salir</a></li>
        </ul>
      </div>
    </div>
  </nav>
