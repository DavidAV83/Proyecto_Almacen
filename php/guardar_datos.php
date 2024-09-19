<?php
// Registrar los datos POST para depuración
error_log(print_r($_POST, true));

$servername = "localhost";
$username = "root";
$password = "david123";
$dbname = "metro_cdmx";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar datos del POST
$expediente = $_POST['expediente'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$fecha_mov = $_POST['fecha_mov'];
$codigo = $_POST['codigo'];
$folio = $_POST['folio'];
$cantidad = $_POST['cantidad'];
$tren = $_POST['tren'];
$area = $_POST['area'];

// Recuperar datos de los carros
$carros = [
    'carro_1' => 'M',
    'carro_2' => 'R',
    'carro_3' => 'N',
    'carro_4' => 'N1',
    'carro_5' => 'PR',
    'carro_6' => 'N2',
    'carro_7' => 'N3',
    'carro_8' => 'R1',
    'carro_9' => 'M1'
];

$carro_values = array_fill_keys(array_values($carros), null);
foreach ($carros as $checkbox_name => $campo) {
    if (isset($_POST[$checkbox_name]) && !empty($_POST[$checkbox_name])) {
        $carro_values[$campo] = $_POST[$checkbox_name];
    }
}

// Obtener la existencia actual
$existencia_actual = 0;
$sql_existencia = "SELECT EXISTENCIA FROM histor WHERE CODIGO = ? ORDER BY FECHA DESC LIMIT 1";
$stmt_existencia = $conn->prepare($sql_existencia);
$stmt_existencia->bind_param("s", $codigo);
$stmt_existencia->execute();
$result = $stmt_existencia->get_result();
if ($row = $result->fetch_assoc()) {
    $existencia_actual = $row['EXISTENCIA'];
}
$stmt_existencia->close();

// Calcular la nueva existencia
$nueva_existencia = $existencia_actual - $cantidad;

// Obtener descripción y unidad de medida
$descripcion = '';
$unidad_medida = '';
$sql_info = "SELECT DESCRIPCIO, UNI_MED FROM histor WHERE CODIGO = ? LIMIT 1"; 
$stmt_info = $conn->prepare($sql_info);
$stmt_info->bind_param("s", $codigo);
$stmt_info->execute();
$result_info = $stmt_info->get_result();
if ($row_info = $result_info->fetch_assoc()) {
    $descripcion = $row_info['DESCRIPCIO'];
    $unidad_medida = $row_info['UNI_MED'];
}
$stmt_info->close();

// Variables para bind_param
$salida = 'S';

// Insertar los datos en la base de datos
$sql_insert = "INSERT INTO histor (NUMEXP, NOMBRE, CATEGO, FECHA, FECHASAL, CODIGO, FOLIO, CANSAL, TREN, SECC, M, R, N, N1, PR, N2, N3, R1, M1, SALIDA, EXISTENCIA, DESCRIPCIO, UNI_MED) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param(
    "sssssssssssssssssssssss",  // 23 's' para 23 parámetros
    $expediente, $nombre, $categoria, $fecha_mov, $fecha_mov, $codigo, $folio, $cantidad, $tren, $area,
    $carro_values['M'], $carro_values['R'], $carro_values['N'], $carro_values['N1'], $carro_values['PR'],
    $carro_values['N2'], $carro_values['N3'], $carro_values['R1'], $carro_values['M1'],
    $salida, $nueva_existencia, $descripcion, $unidad_medida
);

if ($stmt_insert->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $stmt_insert->error]);
}

$stmt_insert->close();
$conn->close();
?>

