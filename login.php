<?php
session_start();
include("conexion.php");

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario'] ?? '');
    $contrasena = $_POST['clave'] ?? '';

    $query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);

        if (password_verify($contrasena, $fila['contrasena'])) {
            $_SESSION['usuario'] = $fila['usuario'];
            $_SESSION['rol'] = $fila['rol'];

            header("Location: " . ($fila['rol'] === 'admin' ? "crud_motos.php" : "index.php"));
            exit();
        } else {
            $error = "⚠️ Usuario o contraseña incorrectos.";
        }
    } else {
        $error = "⚠️ Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Fast Motos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #111;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: white;
    }
    .login-box {
      background: #1c1c1c;
      padding: 30px;
      border-radius: 20px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 15px rgba(0,255,255,0.2);
    }
    .form-control {
      background: #2a2a2a;
      color: white;
      border: 1px solid #555;
    }
    .form-control:focus {
      background: #333;
      color: white;
      border-color: #0d6efd;
    }
    .btn-primary {
      background-color: #0d6efd;
      border: none;
    }
    footer {
      position: absolute;
      bottom: 10px;
      width: 100%;
      text-align: center;
      font-size: 0.9em;
      color: #aaa;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h3 class="text-center mb-4">Iniciar Sesión</h3>
    
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger text-center p-2"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="login.php">
      <div class="mb-3">
        <label class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="clave" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
    <p class="text-center mt-3 mb-0"><small>ZELVIX © 2025</small></p>
  </div>

  <footer>
    <small>Desarrollado por Italo Sánchez</small>
  </footer>
</body>
</html>
