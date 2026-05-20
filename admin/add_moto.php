<?php include '../includes/db.php'; include '../includes/header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $sql = "INSERT INTO motos (modelo, precio, descripcion) VALUES ('$modelo', '$precio', '$descripcion')";
    $conn->query($sql);
    echo "<div class='alert alert-success'>Moto agregada con éxito.</div>";
}
?>
<div class="container mt-4">
  <h2>Agregar Moto</h2>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Modelo</label>
      <input type="text" name="modelo" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Precio</label>
      <input type="text" name="precio" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <textarea name="descripcion" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
  </form>
</div>
<?php include '../includes/footer.php'; ?>
