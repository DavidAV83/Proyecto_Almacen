<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'metro_azteca';  // Nombre de la base de datos actualizado
$username = 'root';
$password = 'Terry231';    // Contraseña actualizada

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT M, M1, R, N, N1, PR, N2, N3, R1 FROM parque_vehicular_lb");
    $trenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($trenes);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
