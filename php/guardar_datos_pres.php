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
$fecha_mov = $_POST['fecha_mov'];
$codigo = $_POST['codigo'];
$folio = $_POST['folio'];
$area_p = $_POST['area_p'];
$persona_recibe = $_POST['persona_recibe'];
$persona_entrega = $_POST['persona_entrega'];
$observaciones = $_POST['observaciones'];
$cantidad_ent = $_POST['cantidad_ent'];
$existencia = $_POST['existencia'];
$descripcion = $_POST['descripcion'];

// Obtener la existencia actual
/*
$sql_existencia = "SELECT EXISTENCIA FROM histor WHERE CODIGO = ? ORDER BY ID DESC LIMIT 1";
$stmt_existencia = $conn->prepare($sql_existencia);
$stmt_existencia->bind_param("s", $codigo);
$stmt_existencia->execute();
$result = $stmt_existencia->get_result();
$existencia_actual = ($row = $result->fetch_assoc()) ? $row['EXISTENCIA'] : 0;
$stmt_existencia->close();
*/


// Obtener unidad de medida
$unidad_medida = '';
$sql_uni_med = "SELECT UNI_MED FROM histor WHERE CODIGO = ? AND UNI_MED != '' AND UNI_MED IS NOT NULL LIMIT 1";
$stm_uni_med = $conn->prepare($sql_uni_med);
$stm_uni_med->bind_param("s", $codigo);
$stm_uni_med->execute();
$result = $stm_uni_med->get_result();
if ($row = $result->fetch_assoc()) {
    $unidad_medida = $row['UNI_MED'];
}
$stm_uni_med->close();


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

// Variables para bind_param
$salida = 'S';
$presto = 'X';
$presta = 'X';

// Calcular la nueva existencia
$nueva_existencia = $existencia - $cantidad_ent;

// Insertar los datos en la base de datos
$sql_insert = "INSERT INTO histor (CODIGO, DESCRIPCIO, UNI_MED, CANSAL, FECHASAL, FECHA, EXISTENCIA, SALIDA, RECIBE, ENTREGA, AREA, FOLIO, CANTIDAD, COSTO, OBSERVA, PRESTO, PRESTA) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param(
    "sssssssssssssssss",
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
    $presto,
    $presta
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