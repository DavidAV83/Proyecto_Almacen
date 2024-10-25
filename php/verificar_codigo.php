<?php
// Configura los detalles de la conexión a la base de datos
$host = 'localhost'; // Cambia esto según tu configuración
$db = 'metro_cdmx'; // Nombre de la base de datos
$user = 'root'; // Nombre de usuario
$pass = 'david123'; // Contraseña

// Crea una conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtén el código enviado desde el frontend
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';

// Prepara la consulta SQL para obtener el registro más reciente
$sql = "
    SELECT EXISTENCIA, DESCRIPCIO
    FROM histor
    WHERE CODIGO = ? 
    ORDER BY ID DESC
    LIMIT 1
";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $codigo);
$stmt->execute();
$result = $stmt->get_result();

// Verifica si se encontraron resultados
if ($row = $result->fetch_assoc()) {
    $existencia = $row['EXISTENCIA']; // Accede a la columna EXISTENCIA
    $descripcion = $row['DESCRIPCIO'];
    echo json_encode(['existe' => true, 'existencia' => $existencia, 'descripcion' => $descripcion]);
} else {
    echo json_encode(['existe' => false, 'mensaje' => 'Código no encontrado']);
}

// Cierra la conexión
$stmt->close();
$conn->close();
?>
