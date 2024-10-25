<?php
error_log(print_r($_POST, true));

$servername = "localhost";
$username = "root";
$password = "david123";
$dbname = "metro_cdmx";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$codigo = $_POST['codigo'];
$fecha_mov = $_POST['fecha_mov'];
$folio = $_POST['folio'];
$area_p = $_POST['area_p'];
$persona_recibe = $_POST['persona_recibe'];
$persona_entrega = $_POST['persona_entrega'];
$descripcion = $_POST['descripcion'];
$existencia = $_POST['existencia'];
$cantidad_ent = $_POST['cantidad_ent'];
$observaciones = $_POST['observaciones'];

$unidad_medida = '';
$sql_uni_med = "SELECT UNI_MED FROM histor WHERE CODIGO = ? AND UNI_MED != '' AND UNI_MED IS NOT NULL LIMIT 1";
$stmt_uni_med = $conn->prepare($sql_uni_med);
$stmt_uni_med->bind_param("s", $codigo);
$stmt_uni_med->execute();
$result = $stmt_uni_med->get_result();
if ($row = $result->fetch_assoc()) {
    $unidad_medida = $row['UNI_MED'];
}
$stmt_uni_med->close();

$costo = 0;
$sql_costo = "SELECT COSTO FROM histor WHERE CODIGO = ? AND COSTO != 0 AND COSTO IS NOT NULL LIMIT 1";
$stmt_costo = $conn->prepare($sql_costo);
$stmt_costo->bind_param("s", $codigo);
$stmt_costo->execute();
$result_costo = $stmt_costo->get_result();
if ($row_costo = $result_costo->fetch_assoc()) {
    $costo = $row_costo['COSTO'];
}
$stmt_costo->close();

$salida = 'S';
$devolucion= 'X';


$nueva_existencia = $existencia - $cantidad_ent;

$sql_insert = "INSERT INTO histor (CODIGO, DESCRIPCIO, UNI_MED, CANSAL, FECHASAL, FECHA, EXISTENCIA, SALIDA, RECIBE, ENTREGA, AREA, FOLIO, CANTIDAD, COSTO, OBSERVA, DEVALMA)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param(
    "ssssssssssssssss",
    $codigo,
    $descripcion,
    $unidad_medida,
    $cantidad_ent,
    $fecha_mov,
    $fecha_mov,
    $nueva_existencia,
    $salida,
    $persona_recibe,
    $persona_entrega,
    $area_p,
    $folio,
    $cantidad_ent,
    $costo,
    $observaciones,
    $devolucion
);

if ($stmt_insert->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    error_log('Error en la inserción: ' . $stmt_insert->error);
    echo json_encode(['status' => 'error', 'message' => 'Error en la base de datos.']);
}
$stmt_insert->close();
$conn->close();
?>