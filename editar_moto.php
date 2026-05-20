<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}
include("conexion.php");

// Sanitizar ID
$id = intval($_GET['id']);
$moto = $conexion->query("SELECT * FROM motos WHERE id = $id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $anio = $_POST['anio'];
    $colores = $_POST['colores'];


    if (!empty($_FILES['imagen']['name'])) {
        $imagenOriginal = $_FILES['imagen']['name'];
        $imagen = time() . "_" . preg_replace("/[^a-zA-Z0-9\.-]/", "_", $imagenOriginal);
        move_uploaded_file($_FILES['imagen']['tmp_name'], 'img/' . $imagen);
    } else {
        $imagen = $moto['imagen']; // Mantener imagen anterior
    }

$sql = "UPDATE motos SET modelo='$modelo', precio='$precio', stock='$stock', imagen='$imagen', colores='$colores' WHERE id=$id";

    $conexion->query($sql);
    header("Location: crud_motos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Moto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2>Editar Moto</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Modelo</label>
      <input type="text" name="modelo" value="<?= htmlspecialchars($moto['modelo']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Precio</label>
      <input type="number" name="precio" value="<?= $moto['precio'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Stock</label>
      <input type="number" name="stock" value="<?= $moto['stock'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <textarea name="descripcion" class="form-control" rows="4" required><?= htmlspecialchars($moto['descripcion']) ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Tipo</label>
      <input type="text" name="tipo" value="<?= htmlspecialchars($moto['tipo']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Año</label>
      <input type="number" name="anio" value="<?= $moto['anio'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
  <label class="form-label">Colores disponibles</label>
  <input type="text" name="colores" value="<?= $moto['colores'] ?>" class="form-control">
</div>

    <div class="mb-3">
      <label class="form-label">Imagen actual</label><br>
      <img src="img/<?= htmlspecialchars($moto['imagen']) ?>" width="150">
    </div>
    <div class="mb-3">
      <label class="form-label">Cambiar imagen (opcional)</label>
      <input type="file" name="imagen" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="crud_motos.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
