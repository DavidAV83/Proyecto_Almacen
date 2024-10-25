<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'metro_cdmx';
$username = 'root';
$password = 'david123';

// Crea la conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die(json_encode(['error' => 'Conexión fallida: ' . $conn->connect_error]));
}

// Consulta para obtener el último FOLIO
$sql = "SELECT FOLIO FROM histor ORDER BY ID DESC LIMIT 1";
$result = $conn->query($sql);

// Verifica si se encontró un resultado
if ($result && $result->num_rows > 0) {
    $ultimoFolio = $result->fetch_assoc()['FOLIO'];
    echo json_encode(['ultimo_folio' => $ultimoFolio]);
} else {
    echo json_encode(['ultimo_folio' => null]);
}

// Cierra la conexión
$conn->close();
?>
