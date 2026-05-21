<?php
$host = "mysql.railway.internal";
$user = "root";
$pass = "IsNJWDRhiCGZnmDjRSjZUvIOkYxDqfEG";
$dbname = "railway";
$port = 3306;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>