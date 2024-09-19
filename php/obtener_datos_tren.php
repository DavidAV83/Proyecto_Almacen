<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'metro_cdmx';
$username = 'root';
$password = 'david123';

$tren = isset($_POST['tren']) ? $_POST['tren'] : '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Separar el tren en M y M1
    list($m, $m1) = explode('/', $tren);

    $stmt = $pdo->prepare("SELECT M, M1, R, N, N1, PR, N2, N3, R1 FROM parque_vehicular_lb WHERE M = :m AND M1 = :m1");
    $stmt->execute(['m' => $m, 'm1' => $m1]);
    $trenData = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($trenData);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}


