<?php
$servername = "localhost"; // Cambia esto si tu servidor MySQL no está en localhost
$username = "root"; // Cambia esto al nombre de usuario de tu base de datos
$password = "022124Haziel02#"; // Cambia esto a la contraseña de tu base de datos
$dbname = "bd_practica_php"; // Cambia esto al nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
