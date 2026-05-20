

<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}else{
    
}

include("conexion.php");
include 'includes/header_admin.php';


// Eliminar moto
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $conexion->query("DELETE FROM motos WHERE id=$id");
    header("Location: crud_motos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Motos - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Administración de Motos</h2>
    <a href="logout.php" class="btn btn-danger mb-3">Cerrar Sesión</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $resultado = $conexion->query("SELECT * FROM motos");
        while ($fila = $resultado->fetch_assoc()):
        ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['modelo'] ?></td>
                <td>S/ <?= number_format($fila['precio'], 2) ?></td>
                <td><?= $fila['stock'] ?></td>
                <td><img src="img/<?= $fila['imagen'] ?>" width="100"></td>
                <td>
                    <a href="editar_moto.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="?eliminar=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar esta moto?')" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <a href="agregar_moto.php" class="btn btn-success">Agregar Nueva Moto</a>
</div>
</body>
</html>
