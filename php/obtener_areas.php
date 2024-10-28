<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configurar el tipo de contenido de la respuesta
header('Content-Type: application/json');

// Datos de conexión a la base de datos
$host = 'localhost';
$dbname = 'metro_azteca';  // Nombre correcto de la base de datos
$username = 'root';
$password = 'Terry231';    // Contraseña correcta

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['error' => 'Conexión fallida: ' . $conn->connect_error]);
    exit;
}

// Consulta para obtener las áreas
$sql = "SELECT AREAS FROM areas";
$result = $conn->query($sql);

// Verificar si hubo un error en la consulta
if ($result === false) {
    echo json_encode(['error' => 'Error en la consulta: ' . $conn->error]);
    exit;
}

// Obtener los resultados de la consulta
$areas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $areas[] = $row['AREAS'];
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Enviar respuesta JSON
echo json_encode($areas);
?>
