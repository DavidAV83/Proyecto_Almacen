<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'metro_azteca';  // Cambiado a tu base de datos correcta
$username = 'root';
$password = 'Terry231';    // Cambiado a tu contraseña correcta
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar el último registro
    $stmt = $pdo->query("SELECT * FROM histor ORDER BY FECHA DESC LIMIT 1");
    $ultimoRegistro = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener el folio del último registro
    $ultimoFolio = $ultimoRegistro['FOLIO'] ?? null; // Usamos null si no se encuentra

    echo json_encode(['ultimo_folio' => $ultimoFolio]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
