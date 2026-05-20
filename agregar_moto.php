<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $colores = $_POST['colores'];
    $tipo = $_POST['tipo'];
    $anio = $_POST['anio'];
    
    // Procesar la imagen
    if (!empty($_FILES['imagen']['name'])) {
        $imagenOriginal = $_FILES['imagen']['name'];
        $imagen = time() . "_" . preg_replace("/[^a-zA-Z0-9\.-]/", "_", $imagenOriginal);
        move_uploaded_file($_FILES['imagen']['tmp_name'], 'img/' . $imagen);
    } else {
        $imagen = ''; // O un nombre por defecto
    }

   $sql = "INSERT INTO motos (modelo, precio, stock, imagen, descripcion, tipo, anio, colores)
        VALUES ('$modelo', '$precio', '$stock', '$imagen', '$descripcion', '$tipo', '$anio', '$colores')";

    $conn->query($sql);
    header("Location: crud_motos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Moto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>
<div class="container mt-4">
  <h2>Agregar Nueva Moto</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Modelo</label>
      <input type="text" name="modelo" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Precio</label>
      <input type="number" name="precio" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Stock</label>
      <input type="number" name="stock" class="form-control" required>
    </div>
    <div class="mb-3">
  <label class="form-label">Descripción</label>
  <textarea name="descripcion" class="form-control" required></textarea>
</div>
<div class="mb-3">
  <label class="form-label">Tipo</label>
  <input type="text" name="tipo" class="form-control" required>
</div>
<div class="mb-3">
  <label class="form-label">Año</label>
  <input type="number" name="anio" class="form-control" min="1900" max="2099" required>
</div>
<div class="mb-3">
  <label class="form-label">Colores disponibles (separados por comas)</label>
  <input type="text" name="colores" class="form-control" placeholder="Rojo, Negro, Azul">
</div>


    <div class="mb-3">
      <label class="form-label">Imagen</label>
      <input type="file" name="imagen" class="form-control" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="crud_motos.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>
