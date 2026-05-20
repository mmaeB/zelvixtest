<?php
session_start();



include 'includes/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $clave_plana = $_POST['clave'];
    // $rol = $_POST['rol'];
    $rol = 'cliente'; // Forzar el rol


    $contrasena = password_hash($clave_plana, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena, rol) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $usuario, $contrasena, $rol);
    
    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "<div class='alert alert-danger text-center'>❌ Error al registrar: " . $stmt->error . "</div>";
    }
    
}
?>

<main class="container mt-5">
  <div class="card shadow-lg p-4 mx-auto" style="max-width: 500px; background-color: #f9f9f9;">
    <h3 class="text-center mb-4">Registrarse</h3>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="clave" class="form-control" required>
      </div>
      <!-- <div class="mb-3">
        <label class="form-label">Rol</label>
        <select name="rol" class="form-select" required>
          <option value="cliente">Cliente</option>
          <option value="admin">Administrador</option>
        </select>
      </div> -->
      <button type="submit" class="btn btn-success w-100">Registrarse</button>
    </form>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
