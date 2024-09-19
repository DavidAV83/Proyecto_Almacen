<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'metro_cdmx';
$username = 'root';
$password = 'david123';

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['error' => 'Conexión fallida: ' . $conn->connect_error]);
    exit;
}

// Consulta para obtener las áreas
$sql = "SELECT AREAS FROM areas";
$result = $conn->query($sql);

if ($result === false) {
    echo json_encode(['error' => 'Error en la consulta: ' . $conn->error]);
    exit;
}

$areas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $areas[] = $row['AREAS'];
    }
}

$conn->close();

// Enviar respuesta JSON
echo json_encode($areas);

