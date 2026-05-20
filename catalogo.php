<?php include 'includes/db.php'; include 'includes/header.php'; ?>

<div class="container mt-4">
  <h1 class="mb-4">Nuestras Motos</h1>
  <div class="row">
    <?php
    $sql = "SELECT * FROM motos";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
    echo "<div class='col-md-4'>
            <div class='card mb-4 shadow-sm'>
              <img src='img/{$row['imagen']}' class='card-img-top' alt='{$row['modelo']}' style='height: 200px; object-fit: cover;'>
              <div class='card-body'>  
                <h5 class='card-title'>{$row['modelo']}</h5>
                <p class='card-text'>S/ {$row['precio']}</p>
                <a href='moto.php?id={$row['id']}' class='btn btn-primary w-100'>Ver más</a>
              </div>
            </div>
          </div>";
    }
    ?>
  </div>
</div>
  <?php include 'includes/message_wsp.php'; ?>
<?php include 'includes/footer.php'; ?>
