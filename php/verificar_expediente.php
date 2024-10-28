<?php
// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "Terry231";  // Contraseña actualizada
$dbname = "metro_azteca";  // Cambiado al nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener expediente enviado por POST
$expediente = $_POST['expediente'];

// Preparar y ejecutar consulta
$sql = "SELECT NOMBRE, CATEGO FROM histor WHERE NUMEXP = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $expediente);
$stmt->execute();
$result = $stmt->get_result();

$response = array('existe' => false);

if ($row = $result->fetch_assoc()) {
    $response['existe'] = true;
    $response['nombre'] = $row['NOMBRE'];
    $response['categoria'] = $row['CATEGO'];
}

echo json_encode($response);

// Cerrar conexión
$stmt->close();
$conn->close();
?>
