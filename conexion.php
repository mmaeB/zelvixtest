<?php
$host = "mysql.railway.internal";
$user = "root";
$pass = "IsNJWDRhiCGZnmDjRSjZUvIOkYxDqfEG";
$dbname = "railway";
$port = 3306;

// ¡AQUÍ ESTÁ EL CAMBIO! $conn ahora es $conexion
$conexion = new mysqli($host, $user, $pass, $dbname, $port);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>