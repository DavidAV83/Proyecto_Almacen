<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'metro_cdmx';
$username = 'root';
$password = 'david123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT M, M1, R, N, N1, PR, N2, N3, R1 FROM parque_vehicular_lb");
    $trenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($trenes);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
