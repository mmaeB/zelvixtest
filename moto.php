<?php 
include 'includes/db.php'; 
include 'includes/header.php'; 


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>ID de moto no válido.</div>";
    include 'includes/footer.php';
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM motos WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<div class='alert alert-warning'>Moto no encontrada.</div>";
    include 'includes/footer.php';
    exit();
}

$moto = $result->fetch_assoc();
?>

<div class="container mt-5">
  <div class="card shadow-lg border-0">
    <div class="row g-0">
      <div class="col-md-5">
        <img src="img/<?= $moto['imagen'] ?>" class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="<?= $moto['modelo'] ?>">
      </div>
      <div class="col-md-7">
        <div class="card-body">
          <h3 class="card-title"><?= htmlspecialchars($moto['modelo']) ?></h3>
          
          <p><strong>Precio:</strong> S/ <?= number_format($moto['precio'], 2) ?></p>
          <p><strong>Stock:</strong> <?= $moto['stock'] > 0 ? $moto['stock'] . ' disponibles' : '<span class="text-danger">Agotado</span>' ?></p>
          

          <?php if (!empty($moto['descripcion'])): ?>
            <p class="card-text"><strong>Tipo:</strong> <?= htmlspecialchars($moto['tipo']) ?></p>
            <p class="card-text"><strong>Año:</strong> <?= $moto['anio'] ?></p>
            <p class="card-text"><strong>Descripción:</strong> <?= nl2br(htmlspecialchars($moto['descripcion'])) ?></p>
            <p class="card-text"><strong>Colores disponibles:</strong> <?= htmlspecialchars($moto['colores']) ?></p>


          <?php endif; ?>

          <div class="mt-4 d-flex gap-2">
            <a href="catalogo.php" class="btn btn-secondary">← Volver al Catálogo</a>
            <a href="https://wa.me/51924588393?text=Hola%20me%20interesa%20la%20moto%20<?= urlencode($moto['modelo']) ?>%20que%20vi%20en%20ZELVIX%20" target="_blank" class="btn btn-success">
              Consultar por WhatsApp
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
