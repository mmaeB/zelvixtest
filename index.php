

<!-- inicio.php -->

<?php
include 'includes/db.php'; // Conexión a la base de datos
?>


<?php include 'includes/header.php'; ?>


<div class="hero">
  <h1>Bienvenido a ZELVIX</h1>
  <p>Las mejores motos del Perú al mejor precio</p>
  <a href="catalogo.php" class="btn btn-primary mt-3">Ver Catálogo</a>
</div>
<div class="container beneficios mt-5">
  <h2 class="text-center mb-4">¿Por qué elegir bicimotos <span class="text">ZELVIX</span>?</h2>
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="beneficio-box">
        <img src="img/icon-rendimiento.png" alt="Rendimiento" class="beneficio-icon">
        <h5>Alto Rendimiento</h5>
        <p>Motor potente con excelente autonomía para recorridos largos.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="beneficio-box">
        <img src="img/icon-ahorro.png" alt="Ahorro" class="beneficio-icon">
        <h5>Ahorro de Combustible</h5>
        <p>Hasta 180 km por galón, ideal para uso diario y reparto.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="beneficio-box">
        <img src="img/icon-ecologico.png" alt="Ecológico" class="beneficio-icon">
        <h5>Eco-Amigables</h5>
        <p>Menor emisión de gases, ayudando a cuidar el medio ambiente.</p>
      </div>
    </div>
  </div>
</div>
  <?php include 'includes/message_wsp.php'; ?>
<?php include 'includes/footer.php'; ?>
