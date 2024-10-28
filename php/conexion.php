<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "metro_cdmx";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
